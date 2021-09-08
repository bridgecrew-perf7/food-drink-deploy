function getTagById(id_tag){
    $("#form_show_tag").prop("action", "/admin/tag/show-hidden/" + id_tag);
    $("#form_hidden_tag").prop("action", "/admin/tag/show-hidden/" + id_tag);
}