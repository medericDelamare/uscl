(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["base"],{

/***/ "./assets/js/base.js":
/*!***************************!*\
  !*** ./assets/js/base.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  $('.hamburger').click(function () {
    $(this).toggleClass('is-active');
  });
  var sticky = document.querySelector('.sticky');

  if (sticky.style.position !== 'sticky') {
    var stickyTop = sticky.offsetTop;
    document.addEventListener('scroll', function () {
      window.scrollY >= stickyTop ? sticky.classList.add('fixed') : sticky.classList.remove('fixed');
    });
  }

  $(function () {
    $('[data-toggle="tooltip"]').tooltip();
  });
});

/***/ })

},[["./assets/js/base.js","runtime"]]]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvanMvYmFzZS5qcyJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImNsaWNrIiwidG9nZ2xlQ2xhc3MiLCJzdGlja3kiLCJxdWVyeVNlbGVjdG9yIiwic3R5bGUiLCJwb3NpdGlvbiIsInN0aWNreVRvcCIsIm9mZnNldFRvcCIsImFkZEV2ZW50TGlzdGVuZXIiLCJ3aW5kb3ciLCJzY3JvbGxZIiwiY2xhc3NMaXN0IiwiYWRkIiwicmVtb3ZlIiwidG9vbHRpcCJdLCJtYXBwaW5ncyI6Ijs7Ozs7Ozs7O0FBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFBVTtBQUN4QkYsR0FBQyxDQUFDLFlBQUQsQ0FBRCxDQUFnQkcsS0FBaEIsQ0FBc0IsWUFBVTtBQUM1QkgsS0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRSSxXQUFSLENBQW9CLFdBQXBCO0FBQ0gsR0FGRDtBQUdBLE1BQUlDLE1BQU0sR0FBR0osUUFBUSxDQUFDSyxhQUFULENBQXVCLFNBQXZCLENBQWI7O0FBRUEsTUFBSUQsTUFBTSxDQUFDRSxLQUFQLENBQWFDLFFBQWIsS0FBMEIsUUFBOUIsRUFBd0M7QUFDcEMsUUFBSUMsU0FBUyxHQUFHSixNQUFNLENBQUNLLFNBQXZCO0FBRUFULFlBQVEsQ0FBQ1UsZ0JBQVQsQ0FBMEIsUUFBMUIsRUFBb0MsWUFBWTtBQUM1Q0MsWUFBTSxDQUFDQyxPQUFQLElBQWtCSixTQUFsQixHQUNJSixNQUFNLENBQUNTLFNBQVAsQ0FBaUJDLEdBQWpCLENBQXFCLE9BQXJCLENBREosR0FFSVYsTUFBTSxDQUFDUyxTQUFQLENBQWlCRSxNQUFqQixDQUF3QixPQUF4QixDQUZKO0FBR0gsS0FKRDtBQUtIOztBQUNEaEIsR0FBQyxDQUFDLFlBQVk7QUFDVkEsS0FBQyxDQUFDLHlCQUFELENBQUQsQ0FBNkJpQixPQUE3QjtBQUNILEdBRkEsQ0FBRDtBQUdILENBbEJELEUiLCJmaWxlIjoiYmFzZS5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uKCl7XHJcbiAgICAkKCcuaGFtYnVyZ2VyJykuY2xpY2soZnVuY3Rpb24oKXtcclxuICAgICAgICAkKHRoaXMpLnRvZ2dsZUNsYXNzKCdpcy1hY3RpdmUnKTtcclxuICAgIH0pO1xyXG4gICAgdmFyIHN0aWNreSA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5zdGlja3knKTtcclxuXHJcbiAgICBpZiAoc3RpY2t5LnN0eWxlLnBvc2l0aW9uICE9PSAnc3RpY2t5Jykge1xyXG4gICAgICAgIHZhciBzdGlja3lUb3AgPSBzdGlja3kub2Zmc2V0VG9wO1xyXG5cclxuICAgICAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdzY3JvbGwnLCBmdW5jdGlvbiAoKSB7XHJcbiAgICAgICAgICAgIHdpbmRvdy5zY3JvbGxZID49IHN0aWNreVRvcCA/XHJcbiAgICAgICAgICAgICAgICBzdGlja3kuY2xhc3NMaXN0LmFkZCgnZml4ZWQnKSA6XHJcbiAgICAgICAgICAgICAgICBzdGlja3kuY2xhc3NMaXN0LnJlbW92ZSgnZml4ZWQnKTtcclxuICAgICAgICB9KTtcclxuICAgIH1cclxuICAgICQoZnVuY3Rpb24gKCkge1xyXG4gICAgICAgICQoJ1tkYXRhLXRvZ2dsZT1cInRvb2x0aXBcIl0nKS50b29sdGlwKClcclxuICAgIH0pO1xyXG59KTsiXSwic291cmNlUm9vdCI6IiJ9