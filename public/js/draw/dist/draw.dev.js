"use strict";

document.addEventListener('DOMContentLoaded', function () {
  // Detectar chrome
  if (navigator.userAgent.indexOf("Chrome") == -1) {
    $('#al').text('Su navegador puede que no sea compatible al 100%, por favor use Google Chrome en Ordenador');
  } // state


  var draw = false; // elements

  points = [];
  lines = [];
  var svg = null;
  var lastDrawLines = [];
  var lastDrawPoints = [];
  var width = 300,
      height = 300;

  function render() {
    // create the selection area
    svg = d3.select('#draw') //  .attr('height', window.innerHeight)
    .attr('height', "45rem") // .attr('width', window.innerWidth);
    .attr('width', "100%");
    svg.on('mousedown', function () {
      draw = true;
      var coords = d3.mouse(this);
      draw_point(coords[0], coords[1], false);
    });
    svg.on('mouseup', function () {
      lastDrawLines.push(lines.length);
      lastDrawPoints.push(points.length); //console.log(lastDrawLines);
      //console.log(lastDrawLines[lastDrawLines.length-2]);
      //console.log(lines);
      //console.log(points);

      draw = false;
    }); //export

    d3.select('#saveButton').on('click', function () {
      var svgString = getSVGString(svg.node());
      svgString2Image(svgString, 2 * width, 2 * height, 'png', save); // passes Blob and filesize String to the callback

      function save(dataBlob, filesize) {
        saveAs(dataBlob, 'dibujo.png'); // FileSaver.js function
      }
    }); // getSVGString ( svgNode ) and svgString2Image( svgString, width, height, format, callback )

    function getSVGString(svgNode) {
      svgNode.setAttribute('xlink', 'http://www.w3.org/1999/xlink');
      var cssStyleText = getCSSStyles(svgNode);
      appendCSS(cssStyleText, svgNode);
      var serializer = new XMLSerializer();
      var svgString = serializer.serializeToString(svgNode);
      svgString = svgString.replace(/(\w+)?:?xlink=/g, 'xmlns:xlink='); // Fix root xlink without namespace

      svgString = svgString.replace(/NS\d+:href/g, 'xlink:href'); // Safari NS namespace fix

      return svgString;

      function getCSSStyles(parentElement) {
        var selectorTextArr = []; // Add Parent element Id and Classes to the list

        selectorTextArr.push('#' + parentElement.id);

        for (var c = 0; c < parentElement.classList.length; c++) {
          if (!contains('.' + parentElement.classList[c], selectorTextArr)) selectorTextArr.push('.' + parentElement.classList[c]);
        } // Add Children element Ids and Classes to the list


        var nodes = parentElement.getElementsByTagName("*");

        for (var i = 0; i < nodes.length; i++) {
          var id = nodes[i].id;
          if (!contains('#' + id, selectorTextArr)) selectorTextArr.push('#' + id);
          var classes = nodes[i].classList;

          for (var c = 0; c < classes.length; c++) {
            if (!contains('.' + classes[c], selectorTextArr)) selectorTextArr.push('.' + classes[c]);
          }
        } // Extract CSS Rules


        var extractedCSSText = "";

        for (var i = 0; i < document.styleSheets.length; i++) {
          var s = document.styleSheets[i];

          try {
            if (!s.cssRules) continue;
          } catch (e) {
            if (e.name !== 'SecurityError') throw e; // for Firefox

            continue;
          }

          var cssRules = s.cssRules;

          for (var r = 0; r < cssRules.length; r++) {
            if (contains(cssRules[r].selectorText, selectorTextArr)) extractedCSSText += cssRules[r].cssText;
          }
        }

        return extractedCSSText;

        function contains(str, arr) {
          return arr.indexOf(str) === -1 ? false : true;
        }
      }

      function appendCSS(cssText, element) {
        var styleElement = document.createElement("style");
        styleElement.setAttribute("type", "text/css");
        styleElement.innerHTML = cssText;
        var refNode = element.hasChildNodes() ? element.children[0] : null;
        element.insertBefore(styleElement, refNode);
      }
    }

    function svgString2Image(svgString, width, height, format, callback) {
      var format = format ? format : 'png';
      var imgsrc = 'data:image/svg+xml;base64,' + btoa(unescape(encodeURIComponent(svgString))); // Convert SVG string to data URL

      var canvas = document.createElement("canvas");
      var context = canvas.getContext("2d");
      canvas.width = width;
      canvas.height = height;
      var image = new Image();

      image.onload = function () {
        context.clearRect(0, 0, width, height);
        context.drawImage(image, 0, 0, width, height);
        canvas.toBlob(function (blob) {
          var filesize = Math.round(blob.length / 1024) + ' KB';
          if (callback) callback(blob, filesize);
        });
      };

      image.src = imgsrc;
    }

    svg.on('mousemove', function () {
      if (!draw) return;
      var coords = d3.mouse(this);
      draw_point(coords[0], coords[1], true);
    });

    document.querySelector('#erase').onclick = function () {
      for (var i = 0; i < points.length; i++) {
        points[i].remove();
      }

      for (var _i = 0; _i < lines.length; _i++) {
        lines[_i].remove();
      }

      points = [];
      lines = [];
    };

    document.querySelector('#undo').onclick = function () {
      if (lastDrawPoints[lastDrawPoints.length - 2] == null) {
        for (var i = 0; i < points.length; i++) {
          points[i].remove();
        }

        for (var _i2 = 0; _i2 < lines.length; _i2++) {
          lines[_i2].remove();
        }

        points = [];
        lines = []; //console.log(lines);
      }

      for (var _i3 = lastDrawPoints[lastDrawPoints.length - 2]; _i3 < lastDrawPoints[lastDrawPoints.length - 1]; _i3++) {
        points[_i3].remove();
      }

      for (var _i4 = lastDrawLines[lastDrawLines.length - 2]; _i4 < lastDrawLines[lastDrawLines.length - 1]; _i4++) {
        lines[_i4].remove();
      }

      lastDrawPoints.pop();
      lastDrawLines.pop();
    };
  }

  function draw_point(x, y, connect) {
    var color = document.querySelector('#color-picker').value;
    var thickness = document.querySelector('#thickness-picker').value;

    if (connect) {
      var last_point = points[points.length - 1];
      var line = svg.append('line').attr('x1', last_point.attr('cx')).attr('y1', last_point.attr('cy')).attr('x2', x).attr('y2', y).attr('stroke-width', thickness * 2).style('stroke', color);
      lines.push(line);
    }

    var point = svg.append('circle').attr('cx', x).attr('cy', y).attr('r', thickness).style('fill', color);
    points.push(point);
  }

  render();
});