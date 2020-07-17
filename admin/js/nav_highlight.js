const path = window.location.href;

//console.log(path);

if(path.indexOf('categories') !== -1)
 {
	document.getElementById('category').classList.add("active");
}

//console.log(path.search(/posts.php$/));
if(path.search(/posts.php$/) !== -1)
 {
	element = document.getElementById('posts_dropdown');
	element.setAttribute('aria-expanded', 'true');
	element.classList.add("collapse");
	element.classList.add("in");
	document.querySelector('#posts_view_all').style.backgroundColor = "#080808";
}