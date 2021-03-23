if (window.CanvasRenderingContext2D && CanvasRenderingContext2D.prototype.getImageData){
	var defaultOffsets = {
		destX   : 0,
		destY   : 0,
		sourceX : 0,
		sourceY : 0,
		width   : 'auto',
		height  : 'auto'
	};
	CanvasRenderingContext2D.prototype.blendOnto = function(destContext,blendMode,offsetOptions){
		var offsets={};
		for (var key in defaultOffsets){
			if (defaultOffsets.hasOwnProperty(key)){
				offsets[key] = (offsetOptions && offsetOptions[key]) || defaultOffsets[key];
			}
		}
		if (offsets.width =='auto') offsets.width =this.canvas.width;
		if (offsets.height=='auto') offsets.height=this.canvas.height;
		offsets.width  = Math.min(offsets.width, this.canvas.width-offsets.sourceX, destContext.canvas.width-offsets.destX );
		offsets.height = Math.min(offsets.height,this.canvas.height-offsets.sourceY,destContext.canvas.height-offsets.destY);

		var srcD = this.getImageData(offsets.sourceX,offsets.sourceY,offsets.width,offsets.height);
		var dstD = destContext.getImageData(offsets.destX,offsets.destY,offsets.width,offsets.height);
		var src  = srcD.data;
		var dst  = dstD.data;
		var sA, dA, len=dst.length;
		var sRA, sGA, sBA, dRA, dGA, dBA, dA2;
		var demultiply;
		var newColor = {r:0,g:0,b:0, a:0};

		for (var px=0;px<len;px+=4){
			sA  = src[px+3]/255;
			dA  = dst[px+3]/255;
			dA2 = (sA + dA - sA*dA);
			dst[px+3] = dA2*255;

			sRA = src[px  ]/255*sA;
			dRA = dst[px  ]/255*dA;
			sGA = src[px+1]/255*sA;
			dGA = dst[px+1]/255*dA;
			sBA = src[px+2]/255*sA;
			dBA = dst[px+2]/255*dA;
			
			demultiply = 255 / dA2;
		
			switch(blendMode){
				// ******* Very close match to Photoshop

				case 'multiply':
					dst[px  ] = (sRA*dRA + sRA*(1-dA) + dRA*(1-sA)) * demultiply;
					dst[px+1] = (sGA*dGA + sGA*(1-dA) + dGA*(1-sA)) * demultiply;
					dst[px+2] = (sBA*dBA + sBA*(1-dA) + dBA*(1-sA)) * demultiply;
				break;

				// ******* UNSUPPORTED
				default:
					dst[px] = dst[px+3] = 255;
					dst[px+1] = px%8==0 ? 255 : 0;
					dst[px+2] = px%8==0 ? 0 : 255;
			}
		}
		destContext.putImageData(dstD,offsets.destX,offsets.destY);
	};
	// For querying of functionality from other libraries
	var modes = CanvasRenderingContext2D.prototype.blendOnto.supportedBlendModes = 'normal src-over screen multiply difference src-in plus add overlay hardlight colordodge dodge colorburn burn darken lighten exclusion'.split(' ');
	var supports = CanvasRenderingContext2D.prototype.blendOnto.supports = {};
	for (var i=0,len=modes.length;i<len;++i) supports[modes[i]] = true;
}