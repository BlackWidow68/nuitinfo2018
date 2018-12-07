var request = require("request")

function main(lat, lon) {
	var url = 'http://api.apixu.com/v1/forecast.json?key=29ee328aea44435090d202630180612&q='+lat+','+lon+'&days=1';
	var data;

	request({url: url, json: true}, function (error, response, data) {
		if (!error && response.statusCode === 200) {
			for (var k in data) {
				if (data.hasOwnProperty(k)) {
					var ev = data[k];
					for (var a in ev) {
						if (ev.hasOwnProperty(a)) {
							var i = ev[a];
							for (var b in i) {
								if (i.hasOwnProperty(b)) {
									var u = i[b];
								}
							}
						}
					};
				}
			};
			return("La température de " + data.location.name + " sera au maximum de "+ u.day.maxtemp_c + "C et au minimum de " + u.day.mintemp_c + "C.\nVent : " +u.day.maxwind_kph + "km/h\nPécipitation : " + u.day.totalprecip_mm + "mm\nHumidité : " + u.day.avghumidity + '%');
		}
	})
}
