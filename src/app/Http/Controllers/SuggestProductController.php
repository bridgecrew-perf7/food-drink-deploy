<?php

namespace App\Http\Controllers;

use App\Enums\CategoryTypes;
use App\Enums\UserRole;
use App\Http\Requests\SuggestProductRequest;
use App\Models\Categories;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Services\SuggestService;

class SuggestProductController extends Controller
{
    protected $suggestService;

    /**
     * Instantiate a new Order service instance.
     *
     * @param SuggestService $suggestService
     */
    public function __construct(SuggestService $suggestService)
    {
        $this->suggestService = $suggestService;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('web.products.suggest-product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  $request
     * @return Response
     */
    public function store(SuggestProductRequest $request)
    {
        $data = $request->only(['name', 'price', 'amount_of', 'content', 'category_id']);
        $data['slug'] = Str::slug($data['name']);
        $data['images'] = $request->file('images');
        # Insert Product to DB
        $productId = $this->suggestService->create($data);
        if (empty($productId)) {
            return redirect()->route('suggest.create')->with([
                'message' => __('custom.message_order_error_db'),
                'alert' => 'alert-danger',
            ]);
        }
        # Send mail to Admin
        $category = Categories::Category($data['category_id'])->first();
        $name = Auth::user()->name;
        $message = $this->getMessage($name, $productId, $category->name);
        $this->sendMail($message);

        return back()->with([
            'message' => __('custom.message_suggest_success'),
            'alert' => 'alert-success',
        ]);
    }

    /**
     * Send mail to all Admin.
     *
     * @param $message
     */
    private function sendMail($message) {
        $user = User::byRole(UserRole::getKey(0))->first();
        $details = ['title' => __('custom.mail_title_suggest'), 'body' => $message, 'orders' => array()];
        \Mail::to($user->email)->send(new \App\Mail\AdminMail($details));
    }

    # Get message.
    private function getMessage($name, $productId, $category) {
        $message_en = "User $name has requested more products with id $productId, category $category.";
        $message_vi = "Người dùng $name đã yêu cầu thêm một sản phẩm với mã sản phẩm là $productId, danh mục $category.";
        return checkLanguage($message_en, $message_vi);
    }
}
