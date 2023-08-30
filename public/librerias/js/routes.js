(function(name, definition) {
    if (typeof module != 'undefined') {
      module.exports = definition();
    } else if (typeof define == 'function' && typeof define.amd == 'object') {
      define(definition);
    } else {
      this[name] = definition();
    }
  }('Router', function() {
  return {
    routes: [{"uri":"_debugbar\/open","name":"debugbar.openhandler"},{"uri":"_debugbar\/clockwork\/{id}","name":"debugbar.clockwork"},{"uri":"_debugbar\/assets\/stylesheets","name":"debugbar.assets.css"},{"uri":"_debugbar\/assets\/javascript","name":"debugbar.assets.js"},{"uri":"_debugbar\/cache\/{key}\/{tags?}","name":"debugbar.cache.delete"},{"uri":"sanctum\/csrf-cookie","name":"sanctum.csrf-cookie"},{"uri":"_ignition\/health-check","name":"ignition.healthCheck"},{"uri":"_ignition\/execute-solution","name":"ignition.executeSolution"},{"uri":"_ignition\/update-config","name":"ignition.updateConfig"},{"uri":"index","name":"index"},{"uri":"mantenedor\/categoria\/vista","name":"mantenedores.categoria.vista"},{"uri":"mantenedor\/categoria\/nuevo","name":"mantenedores.categoria.nuevo"},{"uri":"mantenedor\/categoria\/listado","name":"mantenedores.categoria.listado"},{"uri":"mantenedor\/categoria\/update\/estado","name":"mantenedores.categoria.update.estado"},{"uri":"mantenedor\/categoria\/editar\/vista","name":"mantenedores.categoria.editar.vista"},{"uri":"finanzas\/guardar","name":"finanzas.guardar"},{"uri":"finanzas\/editar","name":"finanzas.editar"},{"uri":"finanzas\/copiar","name":"finanzas.copiar"},{"uri":"finanzas\/periodo","name":"finanzas.periodo"},{"uri":"estadistica\/resultado","name":"estadistica.resultado"},{"uri":"profile","name":"profile.edit"},{"uri":"profile","name":"profile.update"},{"uri":"profile","name":"profile.destroy"},{"uri":"register","name":"register"},{"uri":"login","name":"login"},{"uri":"forgot-password","name":"password.request"},{"uri":"forgot-password","name":"password.email"},{"uri":"reset-password\/{token}","name":"password.reset"},{"uri":"reset-password","name":"password.store"},{"uri":"verify-email","name":"verification.notice"},{"uri":"verify-email\/{id}\/{hash}","name":"verification.verify"},{"uri":"email\/verification-notification","name":"verification.send"},{"uri":"confirm-password","name":"password.confirm"},{"uri":"password","name":"password.update"},{"uri":"logout","name":"logout"}],
    route: function(name, params) {
      var route = this.searchRoute(name),
          rootUrl = this.getRootUrl(),
          result = "",
          compiled = "";

      if (route) {
        compiled = this.buildParams(route, params);
        result = this.cleanupDoubleSlashes(rootUrl + '/' + compiled);
        result = this.stripTrailingSlash(result);
        return result;
      }

    },
    searchRoute: function(name) {
      for (var i = this.routes.length - 1; i >= 0; i--) {
        if (this.routes[i].name == name) {
          return this.routes[i];
        }
      }
    },
    buildParams: function(route, params) {
      var compiled = route.uri,
          queryParams = {};

      for (var key in params) {
        if (compiled.indexOf('{' + key + '?}') != -1) {
          if (key in params) {
            compiled = compiled.replace('{' + key + '?}', params[key]);
          }
        } else if (compiled.indexOf('{' + key + '}') != -1) {
          compiled = compiled.replace('{' + key + '}', params[key]);
        } else {
          queryParams[key] = params[key];
        }
      }

      compiled = compiled.replace(/\{([^\/]*)\?}/g, "");

      if (!this.isEmptyObject(queryParams)) {
        return compiled + this.buildQueryString(queryParams);
      }

      return compiled;
    },
    getRootUrl: function() {
      return window.location.protocol + '//' + window.location.host;
    },
    buildQueryString: function(params) {
      var ret = [];
      for (var key in params) {
        ret.push(encodeURIComponent(key) + "=" + encodeURIComponent(params[key]));
      }
      return '?' + ret.join("&");
    },
    isEmptyObject: function(obj) {
      var name;
      for (name in obj) {
        return false;
      }
      return true;
    },
    cleanupDoubleSlashes: function(url) {
      return url.replace(/([^:]\/)\/+/g, "$1");
    },
    stripTrailingSlash: function(url) {
      if(url.substr(-1) == '/') {
        return url.substr(0, url.length - 1);
      }
      return url;
    }
  };
}));