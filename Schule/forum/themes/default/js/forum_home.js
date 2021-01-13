function showDisscussions(cat_id){
    var obj = document.getElementById(cat_id);
    if (obj.style.display == 'none') {
        obj.style.display = 'block';
    } else {
        obj.style.display = 'none';
    }
}