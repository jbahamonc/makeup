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
        deleteImgModal(response);
        updateImgColor(response);
      }
    });
  }); // se borra la imagen del modal

  function deleteImgModal(img) {
    image = $("#modal-imagen-".concat(img.id));
    image.remove();
  } // si existe la imgen que se borro se valida que exista en las opciones del productos
  // de ser asi, se actualiza la imagen a la imagen por defecto


  function updateImgColor(img) {
    inputImgColor = ul.find('.mail-file-img input');
    inputImgColor.each(function () {
      var imgColor = $(this);

      if (imgColor.val() == img.url) {
        imgColor.next().attr('src', '/storage/productos/default.png');
        $.ajax({
          headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          },
          url: "/colores/".concat(imgColor.prev().val()),
          type: 'POST',
          success: function success(response) {
            console.log(response);
          }
        });
      }
    });
  }

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
    var li = "<li>\n          <div class=\"thumbnail\">\n              <div class=\"mail-file-img\">\n                   <a href=\"#\" data-target=\"#default-modal\" data-toggle=\"modal\">\n                      <input type=\"hidden\" name=\"imgColor[]\" value=\"productos/default.png\">\n                      <img src=\"/storage/productos/default.png\">\n                   </a>\n              </div>\n              <div class=\"caption text-center\">\n                  <div class=\"flex\">\n                      <input id=\"\" name=\"color[]\" type=\"text\" placeholder=\"Color\" class=\"form-control inline input-sm color\" style=\"margin-bottom: 5px;\">\n                      <input id=\"\" name=\"codigoColor[]\" type=\"color\" placeholder=\"Codigo\" class=\"form-control inline input-sm codigo\">\n                      <input type=\"hidden\" name=\"ope[]\" value=\"insert\">\n                      <input type=\"hidden\" name=\"idColor[]\" value=\"0\">\n                  </div>\n                  <a href=\"#\" class=\"btn btn-sm btn-default delete-color\" data-color-id=\"0\">\n                      <i class=\"demo-pli-recycling icon-lg icon-fw\" id=\"image-delete\"></i>\n                  </a>\n              </div>\n          </div>\n      </li>";
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
  }); // Cambiar el esado del pedido

  $("#changeEstate li a").on("click", function (e) {
    e.preventDefault();
    var estadoNew = 0;

    if ($(this).text() == "Pagado") {
      estadoNew = 2;
    }

    if ($(this).text() == "Cancelado") {
      estadoNew = 3;
    }

    var orden = $("#numOrden").attr('data-orden');
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/estado-pedido/".concat(orden, "/").concat(estadoNew),
      type: 'POST',
      success: function success(response) {
        var panel = $("#panelEstado");
        panel.removeClass().addClass("panel media pad-all ".concat(response.clase_css));
        panel.find('i').removeClass().addClass("icon-3x ".concat(response.icono));
        panel.find('#nombreEstado').text(response.estado);
      }
    });
  }); // Buscar orden por numero de pedido

  $("#buscarOrdenPedido").on("keyup", function (e) {
    e.preventDefault();
    var code = e.keyCode ? e.keyCode : e.which;

    if (code == 13) {
      var orden = $(this).val();
      buscarOrden('orden', tipoPago);
    }
  }); // Buscar orden por estado de pago

  $("#buscarEstadoPago").on("change", function () {
    var tipoPago = $("#buscarEstadoPago :selected").val();
    buscarOrden('pago', tipoPago);
  }); // Buscar orden por estado de envio

  $("#buscarEstadoEnvio").on("change", function () {
    var tipoPago = $("#buscarEstadoEnvio :selected").val();
    buscarOrden('envio', tipoPago);
  }); // Se hace la peticion para traer los pedido dependiendo del tipo

  function buscarOrden(tipo, id) {
    var tbody = $("#listaPedido");
    $.ajax({
      headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      },
      url: "/buscar-orden/".concat(tipo, "/").concat(id),
      type: 'GET',
      success: function success(response) {
        console.log(response);
        var html = "";

        if (response.length > 0) {
          var _iteratorNormalCompletion2 = true;
          var _didIteratorError2 = false;
          var _iteratorError2 = undefined;

          try {
            for (var _iterator2 = response[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
              pedido = _step2.value;
              html += "<tr>\n                                 <td><a class=\"text-info\" href=\"/pedidos/".concat(pedido.num_orden, "\">").concat(pedido.num_orden, "</a></td>\n                                 <td>").concat(pedido.fecha_pedido, "</td>\n                                 <td>").concat(pedido.cliente.name, "</td>\n                                 <td class=\"text-center\">\n                                     <span class=\"label label-table ").concat(pedido.estado_pago.clase_css, "\">").concat(pedido.estado_pago.estado, "</span>\n                                 </td>\n                                 <td class=\"text-center\">\n                                     <span class=\"label label-table label-default\">").concat(pedido.estado_envio.estado, "</span>\n                                 </td>\n                                 <td class=\"text-right\">$ ").concat(new Intl.NumberFormat().format(pedido.total), "</td>\n                              </tr>");
            }
          } catch (err) {
            _didIteratorError2 = true;
            _iteratorError2 = err;
          } finally {
            try {
              if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
                _iterator2.return();
              }
            } finally {
              if (_didIteratorError2) {
                throw _iteratorError2;
              }
            }
          }
        } else {
          html = "<tr><td colspan=\"6\" class=\"text-center\">No se encontro ninguna orden</td></tr>";
        }

        tbody.html(html);
      }
    });
  }
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