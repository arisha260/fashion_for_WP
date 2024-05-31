/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/_components.js":
/*!*******************************!*\
  !*** ./src/js/_components.js ***!
  \*******************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_burger_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./components/_burger.js */ "./src/js/components/_burger.js");
/* harmony import */ var _components_dropdown_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./components/_dropdown.js */ "./src/js/components/_dropdown.js");



/***/ }),

/***/ "./src/js/components/_burger.js":
/*!**************************************!*\
  !*** ./src/js/components/_burger.js ***!
  \**************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
const burger = document.querySelector('.header__burger');
const list = document.querySelector('.nav');
const hero = document.querySelector('.hero');
burger.addEventListener('click', function () {
  burger.classList.toggle('active-burger');
  list.classList.toggle('active-nav');
  hero.classList.toggle('active-hero');
  document.body.classList.toggle('body-hiden');
});

/***/ }),

/***/ "./src/js/components/_dropdown.js":
/*!****************************************!*\
  !*** ./src/js/components/_dropdown.js ***!
  \****************************************/
/***/ ((__unused_webpack___webpack_module__, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
const btn = document.querySelectorAll('.filters-btn');
btn.forEach(e => {
  e.addEventListener('click', event => {
    // const attribute = document.querySelectorAll('[data-btn]');
    const dropdownId = event.target.getAttribute('data-btn');
    console.log(dropdownId);
    const dropdown = document.getElementById(dropdownId);
    dropdown.classList.toggle('active-menu');
  });
});

// document.addEventListener('click', (e) => {
//   if (!e.target.matches('.filters-btn')){
//     const dropdown = document.querySelectorAll('.filters-menu');
//     dropdown.forEach(e => {
//       if (e.classList.contains('active-menu')){
//         e.classList.remove('active-menu');
//       }
//     })
//   }
// })

/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _components_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./_components.js */ "./src/js/_components.js");

})();

/******/ })()
;
//# sourceMappingURL=main.js.map