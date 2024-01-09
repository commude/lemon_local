/* top page main-visual*/
/*
window.onload = function () {
document.querySelector("#background_movie_container.pc_mainvisual").style.display = "block";
document.querySelector("#background_movie_container.pc_mainvisual #main_visual_wrap").style.display = "none";
};
*/

var bdy = document.getElementsByTagName("body");

/*window.onload = function () {*/
window.addEventListener('DOMContentLoaded', function() {

/*=== menu page open close ===*/	
/*open --gnavi menu-button click*/
document.querySelector("#suntoryCommonHd_submenu_btn").onclick = function() {

  	/*submenu status initialize*/
  	let suntoryCommonHd_submenu_list1_li = document.querySelectorAll('ul#suntoryCommonHd_submenu_list1 li');
	    let wkwk = Array.prototype.slice.call(suntoryCommonHd_submenu_list1_li,0); 
        wkwk.forEach(function(element){
	/*suntoryCommonHd_submenu_list1_li.forEach(function(element) {*/
      element.classList.remove('suntoryCommonHd_submenu_sublist_opened');
  	  element.classList.add('suntoryCommonHd_submenu_sublist_notopen');
	});
	let suntoryCommonHd_submenu_list1_li_ul = document.querySelectorAll('ul#suntoryCommonHd_submenu_list1 li ul.suntoryCommonHd_submenu_sublist');
		wkwk = Array.prototype.slice.call(suntoryCommonHd_submenu_list1_li_ul,0); 	
		wkwk.forEach(function(element){
	/*suntoryCommonHd_submenu_list1_li_ul.forEach(function(element) {*/
  	  element.style.display = "none";
	});		
	
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "block";
	
  bdy[0].classList.add("modal_on");
	
};
	
/*close --menu top close-button click*/
document.querySelector("#suntoryCommonHd_02_overlay .suntoryCommonHd_submenu_close").onclick = function() {
  bdy[0].classList.remove("modal_on");
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "none";
};

/*close --menu bottom close-button click*/
document.querySelector("#suntoryCommonHd_02_overlay #suntoryCommonHd_submenu_foot_pc .suntoryCommonHd_submenu_close").onclick = function() {
  bdy[0].classList.remove("modal_on");
  document.querySelector("#suntoryCommonHd_02_overlay").style.display = "none";
};
		
	
	

/*=== every menu open close ===*/		
/*open function*/	
function suntoryCommonHd_submenu_list1_open(parm) {
	
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_products ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_products").className = "suntoryCommonHd_submenu_sublist_notopen";
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_enjoy ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_enjoy").className = "suntoryCommonHd_submenu_sublist_notopen";
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_events ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_events").className = "suntoryCommonHd_submenu_sublist_notopen";
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_recipe-gourmet ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_recipe-gourmet").className = "suntoryCommonHd_submenu_sublist_notopen";
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_eco ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_eco").className = "suntoryCommonHd_submenu_sublist_notopen";
    document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_culture-sports ul").style.display = "none";
    document.getElementById("suntoryCommonHd_submenu_culture-sports").className = "suntoryCommonHd_submenu_sublist_notopen";
		
	document.getElementById("suntoryCommonHd_submenu_"+parm).className = "suntoryCommonHd_submenu_sublist_opened";
	document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_"+parm+" ul").style.display = "block";
}


	
/*products*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_products").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("products");  
  }
};

/*enjoy*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_enjoy").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("enjoy");  
  }
};

/*events*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_events").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("events");  
  }
};

/*recipe-gourmet*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_recipe-gourmet").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("recipe-gourmet");  
  }
};

/*eco*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_eco").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("eco");  
  }
};

/*culture-sports*/		
document.querySelector("ul#suntoryCommonHd_submenu_list1 li#suntoryCommonHd_submenu_culture-sports").onclick = function() {
  if (this.classList.contains("suntoryCommonHd_submenu_sublist_notopen")) {
	suntoryCommonHd_submenu_list1_open("culture-sports");  
  }
};

	

	
	
	
	
});


