// usage: log('inside coolFunc', this, arguments);
// paulirish.com/2009/log-a-lightweight-wrapper-for-consolelog/
window.log = function(){
  log.history = log.history || [];   // store logs to an array for reference
  log.history.push(arguments);
  if(this.console) {
    arguments.callee = arguments.callee.caller;
    var newarr = [].slice.call(arguments);
    (typeof console.log === 'object' ? log.apply.call(console.log, console, newarr) : console.log.apply(console, newarr));
  }
};

// make it safe to use console.log always
(function(b){function c(){}for(var d="assert,clear,count,debug,dir,dirxml,error,exception,firebug,group,groupCollapsed,groupEnd,info,log,memoryProfile,memoryProfileEnd,profile,profileEnd,table,time,timeEnd,timeStamp,trace,warn".split(","),a;a=d.pop();){b[a]=b[a]||c}})((function(){try
{console.log();return window.console;}catch(err){return window.console={};}})());

// Fix of JS negative numbers modulo bug:
Number.prototype.mod=function(n){return((this%n)+n)%n;}
Object.prototype.size=function(){var size=0,key;for(key in this) if(this.hasOwnProperty(key)) size++;return size;}

// jQuery AJAX requests defaults
$.ajaxSetup({url:'jx/do.php',type:'post',dataType:'json',
    error:function(jqXHR,textStatus,errorThrown){console.log({textStatus:textStatus,errorThrown: errorThrown,details: jqXHR});},
    statusCode:{
        404:function(){console.log("Requested page inexists.");},
        408:function(){console.log("Requested page timeouted.");},
        500:function(){console.log("Internal server error on requested page.");}
    }
});

// place any jQuery/helper plugins in here, instead of separate, slower script files.
