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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/QuizComponent.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
/* harmony default export */ __webpack_exports__["default"] = ({
  props: ["quiz"],
  data: function data() {
    return {
      questions: [],
      activeQuestion: null
    };
  },
  computed: {
    currentIndex: function currentIndex() {
      return this.questions.indexOf(this.activeQuestion);
    }
  },
  mounted: function mounted() {
    var _this = this;

    axios.get("/student/quiz/".concat(this.quiz, "/questions")).then(function (response) {
      _this.questions = response.data;
      _this.activeQuestion = _this.questions[0];
    });
  },
  methods: {
    next: function next() {
      this.activeQuestion = this.questions[this.currentIndex + 1];
    },
    previous: function previous() {
      this.activeQuestion = this.questions[this.currentIndex - 1];
    },
    submit: function submit() {
      var answers = [];
      this.questions.forEach(function (question) {
        answers.push({
          question_id: question.id,
          answer1: question.answer1 || null,
          answer2: question.answer2 || null,
          answer3: question.answer3 || null
        });
      });
      axios.post("/student/quiz/".concat(this.quiz, "/answers"), {
        answers: answers
      }).then(function (response) {
        window.location.href = "/digitutor/quiz-result/".concat(response.data.id);
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&":
/*!*******************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css& ***!
  \*******************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.answer-container {\r\n  position: absolute;\r\n  right: 10px;\r\n  bottom: 10px;\n}\r\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/lib/css-base.js":
/*!*************************************************!*\
  !*** ./node_modules/css-loader/lib/css-base.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function(useSourceMap) {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		return this.map(function (item) {
			var content = cssWithMappingToString(item, useSourceMap);
			if(item[2]) {
				return "@media " + item[2] + "{" + content + "}";
			} else {
				return content;
			}
		}).join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};

function cssWithMappingToString(item, useSourceMap) {
	var content = item[1] || '';
	var cssMapping = item[3];
	if (!cssMapping) {
		return content;
	}

	if (useSourceMap && typeof btoa === 'function') {
		var sourceMapping = toComment(cssMapping);
		var sourceURLs = cssMapping.sources.map(function (source) {
			return '/*# sourceURL=' + cssMapping.sourceRoot + source + ' */'
		});

		return [content].concat(sourceURLs).concat([sourceMapping]).join('\n');
	}

	return [content].join('\n');
}

// Adapted from convert-source-map (MIT)
function toComment(sourceMap) {
	// eslint-disable-next-line no-undef
	var base64 = btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap))));
	var data = 'sourceMappingURL=data:application/json;charset=utf-8;base64,' + base64;

	return '/*# ' + data + ' */';
}


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--6-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--6-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../node_modules/css-loader??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./QuizComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/style-loader/lib/addStyles.js":
/*!****************************************************!*\
  !*** ./node_modules/style-loader/lib/addStyles.js ***!
  \****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/

var stylesInDom = {};

var	memoize = function (fn) {
	var memo;

	return function () {
		if (typeof memo === "undefined") memo = fn.apply(this, arguments);
		return memo;
	};
};

var isOldIE = memoize(function () {
	// Test for IE <= 9 as proposed by Browserhacks
	// @see http://browserhacks.com/#hack-e71d8692f65334173fee715c222cb805
	// Tests for existence of standard globals is to allow style-loader
	// to operate correctly into non-standard environments
	// @see https://github.com/webpack-contrib/style-loader/issues/177
	return window && document && document.all && !window.atob;
});

var getTarget = function (target, parent) {
  if (parent){
    return parent.querySelector(target);
  }
  return document.querySelector(target);
};

var getElement = (function (fn) {
	var memo = {};

	return function(target, parent) {
                // If passing function in options, then use it for resolve "head" element.
                // Useful for Shadow Root style i.e
                // {
                //   insertInto: function () { return document.querySelector("#foo").shadowRoot }
                // }
                if (typeof target === 'function') {
                        return target();
                }
                if (typeof memo[target] === "undefined") {
			var styleTarget = getTarget.call(this, target, parent);
			// Special case to return head of iframe instead of iframe itself
			if (window.HTMLIFrameElement && styleTarget instanceof window.HTMLIFrameElement) {
				try {
					// This will throw an exception if access to iframe is blocked
					// due to cross-origin restrictions
					styleTarget = styleTarget.contentDocument.head;
				} catch(e) {
					styleTarget = null;
				}
			}
			memo[target] = styleTarget;
		}
		return memo[target]
	};
})();

var singleton = null;
var	singletonCounter = 0;
var	stylesInsertedAtTop = [];

var	fixUrls = __webpack_require__(/*! ./urls */ "./node_modules/style-loader/lib/urls.js");

module.exports = function(list, options) {
	if (typeof DEBUG !== "undefined" && DEBUG) {
		if (typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};

	options.attrs = typeof options.attrs === "object" ? options.attrs : {};

	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (!options.singleton && typeof options.singleton !== "boolean") options.singleton = isOldIE();

	// By default, add <style> tags to the <head> element
        if (!options.insertInto) options.insertInto = "head";

	// By default, add <style> tags to the bottom of the target
	if (!options.insertAt) options.insertAt = "bottom";

	var styles = listToStyles(list, options);

	addStylesToDom(styles, options);

	return function update (newList) {
		var mayRemove = [];

		for (var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];

			domStyle.refs--;
			mayRemove.push(domStyle);
		}

		if(newList) {
			var newStyles = listToStyles(newList, options);
			addStylesToDom(newStyles, options);
		}

		for (var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];

			if(domStyle.refs === 0) {
				for (var j = 0; j < domStyle.parts.length; j++) domStyle.parts[j]();

				delete stylesInDom[domStyle.id];
			}
		}
	};
};

function addStylesToDom (styles, options) {
	for (var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];

		if(domStyle) {
			domStyle.refs++;

			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}

			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];

			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}

			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles (list, options) {
	var styles = [];
	var newStyles = {};

	for (var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = options.base ? item[0] + options.base : item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};

		if(!newStyles[id]) styles.push(newStyles[id] = {id: id, parts: [part]});
		else newStyles[id].parts.push(part);
	}

	return styles;
}

function insertStyleElement (options, style) {
	var target = getElement(options.insertInto)

	if (!target) {
		throw new Error("Couldn't find a style target. This probably means that the value for the 'insertInto' parameter is invalid.");
	}

	var lastStyleElementInsertedAtTop = stylesInsertedAtTop[stylesInsertedAtTop.length - 1];

	if (options.insertAt === "top") {
		if (!lastStyleElementInsertedAtTop) {
			target.insertBefore(style, target.firstChild);
		} else if (lastStyleElementInsertedAtTop.nextSibling) {
			target.insertBefore(style, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			target.appendChild(style);
		}
		stylesInsertedAtTop.push(style);
	} else if (options.insertAt === "bottom") {
		target.appendChild(style);
	} else if (typeof options.insertAt === "object" && options.insertAt.before) {
		var nextSibling = getElement(options.insertAt.before, target);
		target.insertBefore(style, nextSibling);
	} else {
		throw new Error("[Style Loader]\n\n Invalid value for parameter 'insertAt' ('options.insertAt') found.\n Must be 'top', 'bottom', or Object.\n (https://github.com/webpack-contrib/style-loader#insertat)\n");
	}
}

function removeStyleElement (style) {
	if (style.parentNode === null) return false;
	style.parentNode.removeChild(style);

	var idx = stylesInsertedAtTop.indexOf(style);
	if(idx >= 0) {
		stylesInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement (options) {
	var style = document.createElement("style");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}

	if(options.attrs.nonce === undefined) {
		var nonce = getNonce();
		if (nonce) {
			options.attrs.nonce = nonce;
		}
	}

	addAttrs(style, options.attrs);
	insertStyleElement(options, style);

	return style;
}

function createLinkElement (options) {
	var link = document.createElement("link");

	if(options.attrs.type === undefined) {
		options.attrs.type = "text/css";
	}
	options.attrs.rel = "stylesheet";

	addAttrs(link, options.attrs);
	insertStyleElement(options, link);

	return link;
}

function addAttrs (el, attrs) {
	Object.keys(attrs).forEach(function (key) {
		el.setAttribute(key, attrs[key]);
	});
}

function getNonce() {
	if (false) {}

	return __webpack_require__.nc;
}

function addStyle (obj, options) {
	var style, update, remove, result;

	// If a transform function was defined, run it on the css
	if (options.transform && obj.css) {
	    result = typeof options.transform === 'function'
		 ? options.transform(obj.css) 
		 : options.transform.default(obj.css);

	    if (result) {
	    	// If transform returns a value, use that instead of the original css.
	    	// This allows running runtime transformations on the css.
	    	obj.css = result;
	    } else {
	    	// If the transform function returns a falsy value, don't add this css.
	    	// This allows conditional loading of css
	    	return function() {
	    		// noop
	    	};
	    }
	}

	if (options.singleton) {
		var styleIndex = singletonCounter++;

		style = singleton || (singleton = createStyleElement(options));

		update = applyToSingletonTag.bind(null, style, styleIndex, false);
		remove = applyToSingletonTag.bind(null, style, styleIndex, true);

	} else if (
		obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function"
	) {
		style = createLinkElement(options);
		update = updateLink.bind(null, style, options);
		remove = function () {
			removeStyleElement(style);

			if(style.href) URL.revokeObjectURL(style.href);
		};
	} else {
		style = createStyleElement(options);
		update = applyToTag.bind(null, style);
		remove = function () {
			removeStyleElement(style);
		};
	}

	update(obj);

	return function updateStyle (newObj) {
		if (newObj) {
			if (
				newObj.css === obj.css &&
				newObj.media === obj.media &&
				newObj.sourceMap === obj.sourceMap
			) {
				return;
			}

			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;

		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag (style, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (style.styleSheet) {
		style.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = style.childNodes;

		if (childNodes[index]) style.removeChild(childNodes[index]);

		if (childNodes.length) {
			style.insertBefore(cssNode, childNodes[index]);
		} else {
			style.appendChild(cssNode);
		}
	}
}

function applyToTag (style, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		style.setAttribute("media", media)
	}

	if(style.styleSheet) {
		style.styleSheet.cssText = css;
	} else {
		while(style.firstChild) {
			style.removeChild(style.firstChild);
		}

		style.appendChild(document.createTextNode(css));
	}
}

function updateLink (link, options, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	/*
		If convertToAbsoluteUrls isn't defined, but sourcemaps are enabled
		and there is no publicPath defined then lets turn convertToAbsoluteUrls
		on by default.  Otherwise default to the convertToAbsoluteUrls option
		directly
	*/
	var autoFixUrls = options.convertToAbsoluteUrls === undefined && sourceMap;

	if (options.convertToAbsoluteUrls || autoFixUrls) {
		css = fixUrls(css);
	}

	if (sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = link.href;

	link.href = URL.createObjectURL(blob);

	if(oldSrc) URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ "./node_modules/style-loader/lib/urls.js":
/*!***********************************************!*\
  !*** ./node_modules/style-loader/lib/urls.js ***!
  \***********************************************/
/*! no static exports found */
/***/ (function(module, exports) {


/**
 * When source maps are enabled, `style-loader` uses a link element with a data-uri to
 * embed the css on the page. This breaks all relative urls because now they are relative to a
 * bundle instead of the current page.
 *
 * One solution is to only use full urls, but that may be impossible.
 *
 * Instead, this function "fixes" the relative urls to be absolute according to the current page location.
 *
 * A rudimentary test suite is located at `test/fixUrls.js` and can be run via the `npm test` command.
 *
 */

module.exports = function (css) {
  // get current location
  var location = typeof window !== "undefined" && window.location;

  if (!location) {
    throw new Error("fixUrls requires window.location");
  }

	// blank or null?
	if (!css || typeof css !== "string") {
	  return css;
  }

  var baseUrl = location.protocol + "//" + location.host;
  var currentDir = baseUrl + location.pathname.replace(/\/[^\/]*$/, "/");

	// convert each url(...)
	/*
	This regular expression is just a way to recursively match brackets within
	a string.

	 /url\s*\(  = Match on the word "url" with any whitespace after it and then a parens
	   (  = Start a capturing group
	     (?:  = Start a non-capturing group
	         [^)(]  = Match anything that isn't a parentheses
	         |  = OR
	         \(  = Match a start parentheses
	             (?:  = Start another non-capturing groups
	                 [^)(]+  = Match anything that isn't a parentheses
	                 |  = OR
	                 \(  = Match a start parentheses
	                     [^)(]*  = Match anything that isn't a parentheses
	                 \)  = Match a end parentheses
	             )  = End Group
              *\) = Match anything and then a close parens
          )  = Close non-capturing group
          *  = Match anything
       )  = Close capturing group
	 \)  = Match a close parens

	 /gi  = Get all matches, not the first.  Be case insensitive.
	 */
	var fixedCss = css.replace(/url\s*\(((?:[^)(]|\((?:[^)(]+|\([^)(]*\))*\))*)\)/gi, function(fullMatch, origUrl) {
		// strip quotes (if they exist)
		var unquotedOrigUrl = origUrl
			.trim()
			.replace(/^"(.*)"$/, function(o, $1){ return $1; })
			.replace(/^'(.*)'$/, function(o, $1){ return $1; });

		// already a full url? no change
		if (/^(#|data:|http:\/\/|https:\/\/|file:\/\/\/|\s*$)/i.test(unquotedOrigUrl)) {
		  return fullMatch;
		}

		// convert the url to a full url
		var newUrl;

		if (unquotedOrigUrl.indexOf("//") === 0) {
		  	//TODO: should we add protocol?
			newUrl = unquotedOrigUrl;
		} else if (unquotedOrigUrl.indexOf("/") === 0) {
			// path should be relative to the base url
			newUrl = baseUrl + unquotedOrigUrl; // already starts with '/'
		} else {
			// path should be relative to current directory
			newUrl = currentDir + unquotedOrigUrl.replace(/^\.\//, ""); // Strip leading './'
		}

		// send back the fixed url(...)
		return "url(" + JSON.stringify(newUrl) + ")";
	});

	// send back the fixed css
	return fixedCss;
};


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66& ***!
  \****************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    [
      _c("b-progress", {
        attrs: {
          value: _vm.currentIndex + 1,
          max: _vm.questions.length,
          "show-value": "",
          animated: ""
        }
      }),
      _vm._v(" "),
      _vm.activeQuestion
        ? _c(
            "div",
            { staticClass: "card", staticStyle: { "min-height": "40vh" } },
            [
              _c("div", { staticClass: "card-body" }, [
                _c("h5", { staticClass: "card-title" }, [
                  _vm._v(
                    "\n        " +
                      _vm._s(_vm.activeQuestion.question_name) +
                      "\n        "
                  ),
                  _c(
                    "span",
                    {
                      staticClass: "d-inline-block",
                      staticStyle: { float: "right" }
                    },
                    [
                      _vm.activeQuestion.q_calculator
                        ? _c("img", {
                            attrs: { src: "/images/calc.png", height: "20" }
                          })
                        : _vm._e(),
                      _vm._v(" "),
                      _c("span", { staticClass: "badge badge-primary" }, [
                        _vm._v(
                          "Grade : " + _vm._s(_vm.activeQuestion.question_grade)
                        )
                      ]),
                      _vm._v(" "),
                      _c("span", { staticClass: "badge badge-secondary" }, [
                        _vm._v(
                          "Mark : " + _vm._s(_vm.activeQuestion.question_mark)
                        )
                      ])
                    ]
                  )
                ]),
                _vm._v(" "),
                _c("p", { staticClass: "card-text" }, [
                  _vm._v(_vm._s(_vm.activeQuestion.question_body))
                ]),
                _vm._v(" "),
                _vm.activeQuestion.question_image
                  ? _c("div", { staticClass: "text-center mb-2" }, [
                      _c("img", {
                        staticStyle: {
                          "max-height": "200px",
                          "max-width": "100%"
                        },
                        attrs: {
                          src: "/storage" + _vm.activeQuestion.question_image
                        }
                      })
                    ])
                  : _vm._e(),
                _vm._v(" "),
                _c("div", { staticClass: "answer-container" }, [
                  _c("div", [
                    _vm.activeQuestion.question_type == "fraction"
                      ? _c("div", { staticStyle: { width: "180px" } }, [
                          _c("div", { staticClass: "input-group" }, [
                            _vm.activeQuestion.format[0][0]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-prepend" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[0][0]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.activeQuestion.answer1,
                                  expression: "activeQuestion.answer1"
                                }
                              ],
                              attrs: { type: "text" },
                              domProps: { value: _vm.activeQuestion.answer1 },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.activeQuestion,
                                    "answer1",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _vm.activeQuestion.format[0][1]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-append" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[0][1]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ]),
                          _vm._v(" "),
                          _c("div", {
                            staticStyle: {
                              border: "1px solid black",
                              margin: "5px 0"
                            }
                          }),
                          _vm._v(" "),
                          _c("div", { staticClass: "input-group" }, [
                            _vm.activeQuestion.format[1][0]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-prepend" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[1][0]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.activeQuestion.answer2,
                                  expression: "activeQuestion.answer2"
                                }
                              ],
                              attrs: { type: "text" },
                              domProps: { value: _vm.activeQuestion.answer2 },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.activeQuestion,
                                    "answer2",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _vm.activeQuestion.format[1][1]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-append" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[1][1]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ])
                        ])
                      : _vm.activeQuestion.question_type == "matrix"
                      ? _c("div", { staticStyle: { width: "220px" } }, [
                          _c("div", { staticClass: "row" }, [
                            _vm._m(0),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "col-xs-10",
                                staticStyle: {
                                  width: "180px",
                                  padding: "10px 0"
                                }
                              },
                              [
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[0][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer1,
                                        expression: "activeQuestion.answer1"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer1
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer1",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[0][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]),
                                _vm._v(" "),
                                _c("div", {
                                  staticStyle: { margin: "10px 0" }
                                }),
                                _vm._v(" "),
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[1][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer2,
                                        expression: "activeQuestion.answer2"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer2
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer2",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[1][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _vm._m(1)
                          ])
                        ])
                      : _vm.activeQuestion.question_type == "mixed"
                      ? _c("div", [
                          _c("div", { staticClass: "row" }, [
                            _c(
                              "div",
                              { staticClass: "col-xs-6 align-self-center" },
                              [
                                _c("div", { staticClass: "input-group mr-2" }, [
                                  _vm.activeQuestion.format[0][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer1,
                                        expression: "activeQuestion.answer1"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer1
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer1",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[0][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "div",
                              {
                                staticClass: "col-xs-6",
                                staticStyle: {
                                  width: "180px",
                                  padding: "10px 0"
                                }
                              },
                              [
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[1][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer2,
                                        expression: "activeQuestion.answer2"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer2
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer2",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[1][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ]),
                                _vm._v(" "),
                                _c("div", {
                                  staticStyle: {
                                    margin: "5px 0",
                                    border: "1px solid black"
                                  }
                                }),
                                _vm._v(" "),
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[2][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[2][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer3,
                                        expression: "activeQuestion.answer3"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer3
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer3",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[2][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[2][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]
                            )
                          ])
                        ])
                      : _vm.activeQuestion.question_type == "2-box"
                      ? _c("div", [
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              staticStyle: { width: "400px" }
                            },
                            [
                              _c("div", { staticClass: "col-xs-6" }, [
                                _c("div", { staticClass: "input-group mr-2" }, [
                                  _vm.activeQuestion.format[0][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer1,
                                        expression: "activeQuestion.answer1"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer1
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer1",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[0][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xs-6" }, [
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[1][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer2,
                                        expression: "activeQuestion.answer2"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer2
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer2",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[1][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ])
                            ]
                          )
                        ])
                      : _vm.activeQuestion.question_type == "3-box"
                      ? _c("div", [
                          _c(
                            "div",
                            {
                              staticClass: "row",
                              staticStyle: { width: "600px" }
                            },
                            [
                              _c("div", { staticClass: "col-xs-4" }, [
                                _c("div", { staticClass: "input-group mr-2" }, [
                                  _vm.activeQuestion.format[0][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer1,
                                        expression: "activeQuestion.answer1"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer1
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer1",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[0][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[0][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xs-4" }, [
                                _c("div", { staticClass: "input-group mr-2" }, [
                                  _vm.activeQuestion.format[1][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer2,
                                        expression: "activeQuestion.answer2"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer2
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer2",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[1][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[1][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "col-xs-4" }, [
                                _c("div", { staticClass: "input-group" }, [
                                  _vm.activeQuestion.format[2][0]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-prepend" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[2][0]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e(),
                                  _vm._v(" "),
                                  _c("input", {
                                    directives: [
                                      {
                                        name: "model",
                                        rawName: "v-model",
                                        value: _vm.activeQuestion.answer3,
                                        expression: "activeQuestion.answer3"
                                      }
                                    ],
                                    attrs: { type: "text" },
                                    domProps: {
                                      value: _vm.activeQuestion.answer3
                                    },
                                    on: {
                                      input: function($event) {
                                        if ($event.target.composing) {
                                          return
                                        }
                                        _vm.$set(
                                          _vm.activeQuestion,
                                          "answer3",
                                          $event.target.value
                                        )
                                      }
                                    }
                                  }),
                                  _vm._v(" "),
                                  _vm.activeQuestion.format[2][1]
                                    ? _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "span",
                                            { staticClass: "input-group-text" },
                                            [
                                              _vm._v(
                                                _vm._s(
                                                  _vm.activeQuestion
                                                    .format[2][1]
                                                )
                                              )
                                            ]
                                          )
                                        ]
                                      )
                                    : _vm._e()
                                ])
                              ])
                            ]
                          )
                        ])
                      : _vm.activeQuestion.question_type == "option"
                      ? _c(
                          "div",
                          _vm._l(_vm.activeQuestion.answers, function(answer) {
                            return _c(
                              "div",
                              { key: answer.id, staticClass: "form-check" },
                              [
                                _c("input", {
                                  staticClass: "form-check-input",
                                  attrs: {
                                    type: "radio",
                                    name: "answer",
                                    id: "a" + answer.id
                                  },
                                  domProps: { value: answer.ans1_body }
                                }),
                                _vm._v(" "),
                                _c(
                                  "label",
                                  {
                                    staticClass: "form-check-label",
                                    attrs: { for: "a" + answer.id }
                                  },
                                  [_vm._v(_vm._s(answer.ans1_body))]
                                )
                              ]
                            )
                          }),
                          0
                        )
                      : _c("div", [
                          _c("div", { staticClass: "input-group" }, [
                            _vm.activeQuestion.format[0][0]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-prepend" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[0][0]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e(),
                            _vm._v(" "),
                            _c("input", {
                              directives: [
                                {
                                  name: "model",
                                  rawName: "v-model",
                                  value: _vm.activeQuestion.answer1,
                                  expression: "activeQuestion.answer1"
                                }
                              ],
                              attrs: { type: "text" },
                              domProps: { value: _vm.activeQuestion.answer1 },
                              on: {
                                input: function($event) {
                                  if ($event.target.composing) {
                                    return
                                  }
                                  _vm.$set(
                                    _vm.activeQuestion,
                                    "answer1",
                                    $event.target.value
                                  )
                                }
                              }
                            }),
                            _vm._v(" "),
                            _vm.activeQuestion.format[0][1]
                              ? _c(
                                  "div",
                                  { staticClass: "input-group-append" },
                                  [
                                    _c(
                                      "span",
                                      { staticClass: "input-group-text" },
                                      [
                                        _vm._v(
                                          _vm._s(
                                            _vm.activeQuestion.format[0][1]
                                          )
                                        )
                                      ]
                                    )
                                  ]
                                )
                              : _vm._e()
                          ])
                        ])
                  ])
                ])
              ])
            ]
          )
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "row mt-2" }, [
        _c(
          "div",
          { staticClass: "col-md-4" },
          [
            _vm.currentIndex > 0
              ? _c(
                  "b-button",
                  {
                    staticClass: "form-control btn-success",
                    on: { click: _vm.previous }
                  },
                  [_vm._v("Previous")]
                )
              : _vm._e()
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-md-4" },
          [
            _vm.currentIndex == _vm.questions.length - 1
              ? _c(
                  "b-button",
                  {
                    staticClass: "form-control",
                    attrs: { variant: "primary" },
                    on: { click: _vm.submit }
                  },
                  [_vm._v("Submit")]
                )
              : _vm._e()
          ],
          1
        ),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "col-md-4" },
          [
            _vm.currentIndex < _vm.questions.length - 1
              ? _c(
                  "b-button",
                  {
                    staticClass: "form-control btn-success",
                    on: { click: _vm.next }
                  },
                  [_vm._v("Next")]
                )
              : _vm._e()
          ],
          1
        )
      ])
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-xs-1" }, [
      _c("div", {
        staticStyle: {
          height: "100%",
          width: "10px",
          border: "2px solid black",
          "border-right": "none"
        }
      })
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-xs-1" }, [
      _c("div", {
        staticStyle: {
          height: "100%",
          width: "10px",
          border: "2px solid black",
          "border-left": "none"
        }
      })
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js":
/*!********************************************************************!*\
  !*** ./node_modules/vue-loader/lib/runtime/componentNormalizer.js ***!
  \********************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return normalizeComponent; });
/* globals __VUE_SSR_CONTEXT__ */

// IMPORTANT: Do NOT use ES2015 features in this file (except for modules).
// This module is a runtime utility for cleaner component module output and will
// be included in the final webpack user bundle.

function normalizeComponent (
  scriptExports,
  render,
  staticRenderFns,
  functionalTemplate,
  injectStyles,
  scopeId,
  moduleIdentifier, /* server only */
  shadowMode /* vue-cli only */
) {
  // Vue.extend constructor export interop
  var options = typeof scriptExports === 'function'
    ? scriptExports.options
    : scriptExports

  // render functions
  if (render) {
    options.render = render
    options.staticRenderFns = staticRenderFns
    options._compiled = true
  }

  // functional template
  if (functionalTemplate) {
    options.functional = true
  }

  // scopedId
  if (scopeId) {
    options._scopeId = 'data-v-' + scopeId
  }

  var hook
  if (moduleIdentifier) { // server build
    hook = function (context) {
      // 2.3 injection
      context =
        context || // cached call
        (this.$vnode && this.$vnode.ssrContext) || // stateful
        (this.parent && this.parent.$vnode && this.parent.$vnode.ssrContext) // functional
      // 2.2 with runInNewContext: true
      if (!context && typeof __VUE_SSR_CONTEXT__ !== 'undefined') {
        context = __VUE_SSR_CONTEXT__
      }
      // inject component styles
      if (injectStyles) {
        injectStyles.call(this, context)
      }
      // register component module identifier for async chunk inferrence
      if (context && context._registeredComponents) {
        context._registeredComponents.add(moduleIdentifier)
      }
    }
    // used by ssr in case component is cached and beforeCreate
    // never gets called
    options._ssrRegister = hook
  } else if (injectStyles) {
    hook = shadowMode
      ? function () { injectStyles.call(this, this.$root.$options.shadowRoot) }
      : injectStyles
  }

  if (hook) {
    if (options.functional) {
      // for template-only hot-reload because in that case the render fn doesn't
      // go through the normalizer
      options._injectStyles = hook
      // register for functional component in vue file
      var originalRender = options.render
      options.render = function renderWithStyleInjection (h, context) {
        hook.call(context)
        return originalRender(h, context)
      }
    } else {
      // inject component registration as beforeCreate hook
      var existing = options.beforeCreate
      options.beforeCreate = existing
        ? [].concat(existing, hook)
        : [hook]
    }
  }

  return {
    exports: scriptExports,
    options: options
  }
}


/***/ }),

/***/ "./resources/js/components/QuizComponent.vue":
/*!***************************************************!*\
  !*** ./resources/js/components/QuizComponent.vue ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./QuizComponent.vue?vue&type=template&id=91549c66& */ "./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66&");
/* harmony import */ var _QuizComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./QuizComponent.vue?vue&type=script&lang=js& */ "./resources/js/components/QuizComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./QuizComponent.vue?vue&type=style&index=0&lang=css& */ "./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _QuizComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__["render"],
  _QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/QuizComponent.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/QuizComponent.vue?vue&type=script&lang=js&":
/*!****************************************************************************!*\
  !*** ./resources/js/components/QuizComponent.vue?vue&type=script&lang=js& ***!
  \****************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib??ref--4-0!../../../node_modules/vue-loader/lib??vue-loader-options!./QuizComponent.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************!*\
  !*** ./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/style-loader!../../../node_modules/css-loader??ref--6-1!../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../node_modules/postcss-loader/src??ref--6-2!../../../node_modules/vue-loader/lib??vue-loader-options!./QuizComponent.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(__WEBPACK_IMPORT_KEY__ !== 'default') (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));
 /* harmony default export */ __webpack_exports__["default"] = (_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_6_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_6_2_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default.a); 

/***/ }),

/***/ "./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66& ***!
  \**********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib??vue-loader-options!./QuizComponent.vue?vue&type=template&id=91549c66& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/QuizComponent.vue?vue&type=template&id=91549c66&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_QuizComponent_vue_vue_type_template_id_91549c66___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/mixins.js":
/*!********************************!*\
  !*** ./resources/js/mixins.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

Vue.component('quiz-component', __webpack_require__(/*! ./components/QuizComponent.vue */ "./resources/js/components/QuizComponent.vue")["default"]);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.mixin({
  methods: {
    markAnswer: function markAnswer(feedback_id, status) {
      console.log("hello");
      axios.post("/digitutor/mark-answer", {
        feedback_id: feedback_id,
        status: status
      }).then(function (response) {
        console.log(response.data);
        $(".badge-" + feedback_id).removeClass('badge-succes');
        $(".badge-" + feedback_id).removeClass('badge-warning');
        $(".badge-" + feedback_id).removeClass('badge-danger');
        var newStatus = response.data.status == 1 ? 'success' : 'danger';
        $(".badge-" + feedback_id).addClass('badge-' + newStatus);
      });
    }
  }
});
var app = new Vue({
  el: '#app'
});

/***/ }),

/***/ 1:
/*!**************************************!*\
  !*** multi ./resources/js/mixins.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! E:\PHP\Laravel\mth\resources\js\mixins.js */"./resources/js/mixins.js");


/***/ })

/******/ });