$(function () {
			 var alNav = document.querySelector('#hk-sticky-nav');
			 var navChangePoint = 100;
			 function stickyNav() {
				 if (window.scrollY >= navChangePoint) {
					 alNav.classList.add('hk-fixed-nav');
					 alNav.classList.remove('hk-transparent-nav');
				 } else {
					 alNav.classList.remove('hk-fixed-nav');
					 alNav.classList.add('hk-transparent-nav');
				 }
			 }
			 window.addEventListener('scroll', stickyNav);
         })