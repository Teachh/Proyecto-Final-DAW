"use strict";var _laravelEcho=_interopRequireDefault(require("laravel-echo"));function _interopRequireDefault(e){return e&&e.__esModule?e:{default:e}}window._=require("lodash");try{window.Popper=require("popper.js").default,window.$=window.jQuery=require("jquery"),require("bootstrap")}catch(e){}window.axios=require("axios"),window.axios.defaults.headers.common["X-Requested-With"]="XMLHttpRequest",window.Pusher=require("pusher-js"),window.Echo=new _laravelEcho.default({broadcaster:"pusher",key:process.env.MIX_PUSHER_APP_KEY,cluster:process.env.MIX_PUSHER_APP_CLUSTER,encrypted:!0});