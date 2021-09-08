<!DOCTYPE html>
<html lang="en">

<head>
    @include('includes.admin.login.head')
</head>

<body class="bg-primary">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                @include('includes.admin.login.main')
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                @include('includes.admin.login.footer')
            </footer>
        </div>
    </div>
</body>

</html>