/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 0);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/app.js":
/*!*****************************!*\
  !*** ./resources/js/app.js ***!
  \*****************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
__webpack_require__(/*! ./scripts */ "./resources/js/scripts.js"); //window.Vue = require('vue');

/***/ }),

/***/ "./resources/js/scripts.js":
/*!*********************************!*\
  !*** ./resources/js/scripts.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(document).ready(function () {
  var currentImg;
  var currentInputimg;
  var ul = $("#listColor");
  $("#btn-save-products").on("click", function () {
    var form = document.getElementById('form-products'); // Validar campo nombre

    form.submit();
  });
  $("body").on("click", ".btn-delete-img", function (e) {
    e.preventDefault();
    var btn = $(e.currentTarget);
    var imgId = btn.attr('data-img-id');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/imagenes/".concat(imgId),
      type: 'DELETE',
      success: function success(response) {
        //console.log(response)
        btn.parent().parent().parent().remove();
      }
    });
  });
  $('#default-modal').on('shown.bs.modal', function (e) {
    var a = $(e.relatedTarget);
    currentImg = a.find('img');
    currentInputimg = a.find('input');
  });
  $('body').on('click', '.colorImg', function (e) {
    e.preventDefault();
    var th = $(e.currentTarget);
    var src = th.find('img');
    currentImg.attr('src', src.attr('src'));
    currentInputimg.val(src.attr('data-url'));
    $('#default-modal').modal('hide');
  });
  $("#add-color").on("click", function (e) {
    e.preventDefault();
    var li = "<li>\n          <div class=\"thumbnail\">\n              <div class=\"mail-file-img\">\n                   <a href=\"#\" data-target=\"#default-modal\" data-toggle=\"modal\">\n                      <input type=\"hidden\" name=\"imgColor[]\" value=\"productos/default.png\">\n                      <img src=\"/storage/productos/default.png\">\n                   </a>\n              </div>\n              <div class=\"caption text-center\">\n                  <div class=\"flex\">\n                      <input id=\"\" name=\"color[]\" type=\"text\" placeholder=\"Color\" class=\"form-control inline input-sm color\" style=\"margin-bottom: 5px;\">\n                      <input id=\"\" name=\"codigo[]\" type=\"color\" placeholder=\"Codigo\" class=\"form-control inline input-sm codigo\">\n                      <input type=\"hidden\" name=\"ope[]\" value=\"insert\">\n                      <input type=\"hidden\" name=\"idColor[]\" value=\"0\">\n                  </div>\n                  <a href=\"#\" class=\"btn btn-sm btn-default delete-color\" data-color-id=\"0\">\n                      <i class=\"demo-pli-recycling icon-lg icon-fw\" id=\"image-delete\"></i>\n                  </a>\n              </div>\n          </div>\n      </li>";
    ul.prepend(li);
  });
  $('body').on('click', '.delete-color', function (e) {
    e.preventDefault();
    var a = $(e.currentTarget);
    var id = a.attr('data-color-id');

    if (id != 0) {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "/colores/".concat(id),
        type: 'DELETE',
        success: function success(response) {
          console.log(response);
        }
      });
    }

    a.parent().parent().parent().remove();
  });
  $("#chosen-select").on('change', function () {
    var select = $(this);
    var select2 = $('#chosen-select2');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/subcategorias/".concat(select.val()),
      type: 'GET',
      success: function success(response) {
        console.log(response);
        var html = "";
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = response[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            sub = _step.value;
            html += "<option value=\"".concat(sub.id, "\">").concat(sub.nombre, "</option>");
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator.return != null) {
              _iterator.return();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }

        select2.html(html);
      }
    });
  });
});

/***/ }),

/***/ "./resources/sass/app.scss":
/*!*********************************!*\
  !*** ./resources/sass/app.scss ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports) {

// removed by extract-text-webpack-plugin

/***/ }),

/***/ 0:
/*!*************************************************************!*\
  !*** multi ./resources/js/app.js ./resources/sass/app.scss ***!
  \*************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! E:\xampp\htdocs\makeup\resources\js\app.js */"./resources/js/app.js");
module.exports = __webpack_require__(/*! E:\xampp\htdocs\makeup\resources\sass\app.scss */"./resources/sass/app.scss");


/***/ })

/******/ });