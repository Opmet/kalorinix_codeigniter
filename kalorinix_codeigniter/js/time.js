"use strict";

/**
 * Hanterar tid idag.
 * Timmar och minuter med format 09:01. Idag med format 2015-09-16. 
 * 
 */
function Time(){
	
	/**
	 * Idag med format 2015-09-16.
	 */
	this.getToDay = function() {
		var d = new Date();
		var toDay = d.getFullYear() + '-' + ('0' + d.getMonth() ).slice(-2) + '-' + ('0' + d.getDate() ).slice(-2);
		
		return toDay;
	};
		
	/**
	 * Tiden nu. Timmar och minuter med format 09:01.
	 */
	this.getTimeNow = function() {
		var d = new Date();
		var timeNow = ('0' + d.getHours() ).slice(-2) + ':' + ('0' + d.getMinutes() ).slice(-2);
		
		return timeNow;
	};
		
	/**
	 * Formaterar om insänt datum till format 2015-09-16.
	 */
	this.getDay = function(p_d) {
		var d = new Date( p_d );
		var day = d.getFullYear() + '-' + ('0' + d.getMonth() ).slice(-2) + '-' + ('0' + d.getDate() ).slice(-2);
		
		return day;
	};
};