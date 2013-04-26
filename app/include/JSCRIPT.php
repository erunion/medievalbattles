<script language=javascript>
					if (document.all&&document.all.flashlink){
						var flashlinks=document.all.flashlink
						if (flashlinks.length==null)
						flashlinks[0]=document.all.flashlink
						function changecolor(which,type,color){
						if (type==0){
							if (flashlinks[which].style.color!=color)
							flashlinks[which].style.color=color
						else
							flashlinks[which].style.color=''
							}
							else if (type==1){
							if (flashlinks[which].style.backgroundColor!=color)
							flashlinks[which].style.backgroundColor=color
								else
									flashlinks[which].style.backgroundColor=''
										}
										}
										if (flashlinks.length==null){
										var flashengine='setInterval("changecolor(0,'+flashlinks[0].flashtype+',\''+flashlinks[0].flashcolor+'\')",'+'1000)'
										eval(flashengine)
										}
										else
										for (i=0;i<flashlinks.length;i++){
										var flashengine='setInterval("changecolor('+i+','+flashlinks[i].flashtype+',\''+flashlinks[i].flashcolor+'\')",'+'1000)'
										eval(flashengine)
										}
										}
										</script>