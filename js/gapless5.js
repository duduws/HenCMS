window.mobilecheck=function(){var check=false;(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od|ad)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check=true})(navigator.userAgent||navigator.vendor||window.opera);return check;}
window.hasWebKit=('webkitAudioContext'in window)&&!('chrome'in window);var gapless5AudioContext=(window.hasWebKit)?new webkitAudioContext():(typeof AudioContext!="undefined")?new AudioContext():null;var GAPLESS5_PLAYERS={};var Gapless5State={"None":0,"Loading":1,"Play":2,"Stop":3,"Error":4};var Gapless5Policy={"OOM":0,"Mobile":1,"Desktop":2,"Album":3,"Memory":4,};var Gapless5LookAhead=-1;var Gapless5MBPerMin=10;var Gapless5MaxMemory=256;function Gapless5Source(parentPlayer,inContext,inOutputNode){var context=inContext;var outputNode=inOutputNode;var audioPath="";var audio=null;var source=null;var buffer=null;var request=null;var startTime=0;var position=0;var endpos=0;var queuedState=Gapless5State.None;var state=Gapless5State.None;var loadedPercent=0;var audioFinished=false;var endedCallback=null;var initMS=new Date().getTime();var loadMS=0;var finishMS=0;this.uiDirty=false;var that=this;var parent=parentPlayer;this.setGain=function(val){if(audio!=null)
{audio.volume=val;}}
this.getState=function(){return state;}
var setState=function(newState){state=newState;queuedState=Gapless5State.None;};this.finished=function(){return audioFinished;}
this.timer=function(){var now=new Date().getTime();var timerMS=now-initMS;return timerMS;}
this.cancelRequest=function(isError){setState((isError==true)?Gapless5State.Error:Gapless5State.None);if(request)
{request.abort();}
audio=null;source=null;buffer=null;position=0;endpos=0;initMS=(new Date().getTime());loadMS=0;finishMS=0;that.uiDirty=true;}
var onEnded=function(endEvent){if(state!=Gapless5State.Play)return;audioFinished=true;parent.onEndedCallback();}
var onPlayEvent=function(playEvent){startTime=(new Date().getTime())-position;}
var onLoadedWebAudio=function(inBuffer){if(!request)return;request=null;buffer=inBuffer;endpos=inBuffer.duration*1000;finishMS=startTime+endpos;if(audio!=null||!parent.useHTML5Audio)
{loadMS=(new Date().getTime())-initMS;parent.mgr.dequeueNextLoad();}
if(queuedState==Gapless5State.Play&&state==Gapless5State.Loading)
{playAudioFile(true);}
else if((audio!=null)&&(queuedState==Gapless5State.None)&&(state==Gapless5State.Play))
{position=(new Date().getTime())-startTime;if(!window.hasWebKit)position-=parent.tickMS;that.setPosition(position,true);}
if(state==Gapless5State.Loading)
{state=Gapless5State.Stop;}
audio=null;that.uiDirty=true;}
var onLoadedHTML5Audio=function(inBuffer){if(state!=Gapless5State.Loading)return;if(buffer!=null||!parent.useWebAudio)
{loadMS=(new Date().getTime())-initMS;parent.mgr.dequeueNextLoad();}
state=Gapless5State.Stop;endpos=audio.duration*1000;finishMS=startTime+endpos;if(queuedState==Gapless5State.Play)
{playAudioFile(true);}
that.uiDirty=true;}
this.stop=function(){if(state==Gapless5State.Stop)return;if(parent.useWebAudio)
{if(source)
{if(endedCallback)
{window.clearTimeout(endedCallback);endedCallback=null;}
source.stop(0);}}
if(audio)
{audio.pause();}
setState(Gapless5State.Stop);that.uiDirty=true;};var playAudioFile=function(force){if(state==Gapless5State.Play)return;position=Math.max(position,0);if(position>=endpos)position=0;var offsetSec=position/1000;startTime=(new Date().getTime())-position;if(buffer!=null)
{gapless5AudioContext.resume();source=context.createBufferSource();source.connect(outputNode);source.buffer=buffer;var restSec=source.buffer.duration-offsetSec;if(endedCallback)
{window.clearTimeout(endedCallback);}
endedCallback=window.setTimeout(onEnded,restSec*1000);if(window.hasWebKit)
source.start(0,offsetSec,restSec);else
source.start(0,offsetSec);setState(Gapless5State.Play);}
else if(audio!=null)
{audio.currentTime=offsetSec;audio.volume=outputNode.gain.value;audio.play();setState(Gapless5State.Play);}
that.uiDirty=true;};this.inPlayState=function(){return(state==Gapless5State.Play);}
this.isPlayActive=function(){return(that.inPlayState()||queuedState==Gapless5State.Play)&&!that.audioFinished;}
this.getPosition=function(){return position;}
this.getLength=function(){return endpos;}
this.play=function(){if(state==Gapless5State.Loading)
{queuedState=Gapless5State.Play;}
else
{playAudioFile();}}
this.tick=function(){if(state==Gapless5State.Play)
{position=(new Date().getTime())-startTime;}
if(loadedPercent<1)
{var newPercent=(state==Gapless5State.Loading)?0:(audio&&audio.seekable.length>0)?(audio.seekable.end(0)/audio.duration):1;if(loadedPercent!=newPercent)
{loadedPercent=newPercent;parent.setLoadedSpan(loadedPercent)}}}
this.setPosition=function(newPosition,bResetPlay){position=newPosition;if(bResetPlay==true&&that.inPlayState())
{that.stop();that.play();}};this.load=function(inAudioPath){audioPath=inAudioPath;if(source||audio)
{parent.mgr.dequeueNextLoad();return;}
if(state==Gapless5State.Loading)
{return;}
state=Gapless5State.Loading;if(parent.useWebAudio)
{request=new XMLHttpRequest();request.open('get',inAudioPath,true);request.responseType='arraybuffer';request.onload=function(){context.decodeAudioData(request.response,function(incomingBuffer){onLoadedWebAudio(incomingBuffer);});};request.send();}
if(parent.useHTML5Audio)
{audio=new Audio();audio.controls=false;audio.src=inAudioPath;audio.addEventListener('canplaythrough',onLoadedHTML5Audio,false);audio.addEventListener('ended',onEnded,false);audio.addEventListener('play',onPlayEvent,false);}
$.ajax({url:inAudioPath,type:"HEAD",}).fail(function(){that.cancelRequest(true);});}}
var Gapless5RequestManager=function(parentPlayer){this.orderedPolicy=Gapless5Policy.OOM;this.shuffledPolicy=Gapless5Policy.OOM;this.lookAhead=Gapless5LookAhead;this.sources=[];this.loadQueue=[];this.loadingTrack=-1;var parent=parentPlayer;var that=this;var percentPlayed=function(entry){if(entry.finished()==true)
{return-1;}
return Math.ceil((entry.timer()/entry.finishMS)*100);}
var oomPolicy=function(){if(that.loadQueue.length>0)
{var entry=that.loadQueue.shift();that.loadingTrack=entry[0];if(that.loadingTrack<that.sources.length)
{that.sources[that.loadingTrack].load(entry[1]);}}
else
{that.loadingTrack=-1;}}
this.setPolicy=function(orderedPolicy,shuffledPolicy){that.orderedPolicy=orderedPolicy;that.shuffledPolicy=shuffledPolicy;}
this.getPolicy=function(){if(parent.trk.shuffled()==true)
{return shuffledPolicy;}
else
{return orderedPolicy;}}
this.dequeueNextLoad=function(){oomPolicy();}}
var Gapless5FileList=function(inPlayList,inStartingTrack,inShuffle){this.original=inPlayList;this.previous={};this.current={};this.previousItem=0;this.startingTrack=inStartingTrack;if(inStartingTrack==null)
{this.startingTrack=0;}
if(inStartingTrack=="random")
{this.startingTrack=Math.floor(Math.random()*this.original.length);}
this.currentItem=this.startingTrack;this.trackNumber=this.startingTrack;var that=this;var shuffleMode=inShuffle;var remakeList=false;var clone=function(input){var copy=JSON.parse(JSON.stringify(input));return copy;}
var swapElements=function(someList,sourceIndex,destIndex){var temp=someList[sourceIndex];someList[sourceIndex]=someList[destIndex];someList[destIndex]=temp;}
var addIndices=function(inputList){var temp=inputList.slice();for(var n=0;n<temp.length;n++)
temp[n]._index=n+1;return temp;}
var reorder=function(inputList,desiredIndex){var tempList=clone(inputList);var outputList=tempList.concat(tempList.splice(0,desiredIndex));return outputList;}
var shuffle=function(inputList,index){var startList=inputList.slice();var outputList=inputList.slice();for(var n=0;n<outputList.length-1;n++)
{var k=n+Math.floor(Math.random()*(outputList.length-n));swapElements(outputList,k,n);}
outputList=reorder(outputList,index);var swapIndex=that.lastIndex(index,that.current,outputList);if(swapIndex!=0)
swapElements(outputList,swapIndex,0);return outputList;}
var revertShuffle=function(){that.current=that.previous;that.currentItem=that.previousItem;shuffleMode=!(shuffleMode);remakeList=false;}
var enableShuffle=function(){that.previous=clone(that.current);that.previousItem=that.currentItem;that.current=shuffle(that.original,that.currentItem);that.currentItem=0;shuffleMode=true;remakeList=true;}
var disableShuffle=function(){that.previous=clone(that.current);that.previousItem=that.currentItem;var point=that.lastIndex(that.currentItem,that.current,that.original);that.current=reorder(that.original,point);that.currentItem=0;shuffleMode=false;remakeList=true;}
var addFile=function(point,file,list,listShuffled){var addin={};addin._index=point+1;addin.file=file;for(var i=0;i<list.length;i++)
if(list[i]._index>=addin._index)
list[i]._index=list[i]._index+1;if(listShuffled==true)
list.push(addin);else
list.splice(point,0,addin);}
var removeFile=function(point,list,listShuffled){if(listShuffled==true)
{for(var j=0;j<list.length;j++)
if(list[j]._index==point+1)
list.splice(j,1);}
else
list.splice(point,1);for(var k=0;k<list.length;k++)
if(list[k]._index>=point+1)
list[k]._index=list[k]._index-1;}
this.lastIndex=function(index,newList,oldList){var compare=newList[index];for(var n=0;n<oldList.length;n++)
if(oldList[n]._index==compare._index)
return n;return 0;}
this.shuffleToggle=function(){if(remakeList==true)
return revertShuffle();if(shuffleMode==false)
return enableShuffle();if(shuffleMode==true)
return disableShuffle();}
this.rebasePlayList=function(index){if(shuffleMode==true)
that.current=reorder(that.current,index);that.currentItem=0;remakeList=false;}
this.readyToRemake=function(){return remakeList;}
this.shuffled=function(){return shuffleMode;}
this.set=function(index){that.previousItem=that.currentItem;that.currentItem=index;that.trackNumber=this.current[index]._index;}
this.get=function(index){return that.currentItem;}
this.getIndex=function(index){if(that.shuffled())
{for(var i=0;i<that.current.length;i++)
if(that.current[i]._index==index)
return i-1;}
else
return index;}
this.add=function(index,file){that.previous=clone(that.current);that.previousItem=that.currentItem;addFile(index,file,that.current,shuffleMode);addFile(index,file,that.original,false);if(remakeList==true)
addFile(index,file,that.previous,!(shuffleMode));else
addFile(index,file,that.previous,shuffleMode);if(index<=that.currentItem)
that.currentItem=that.currentItem+1;that.trackNumber=that.current[that.currentItem]._index;}
this.remove=function(index){that.previous=clone(that.current);that.previousItem=that.currentItem;removeFile(index,that.current,shuffleMode);removeFile(index,that.original,shuffleMode);if(remakeList==true)
removeFile(index,that.previous,!(shuffleMode));else
removeFile(index,that.previous,shuffleMode);if((index<that.currentItem)||(index>=that.previous.length-1))
if(that.currentItem>0)
that.currentItem=that.currentItem-1;that.trackNumber=that.current[that.currentItem]._index;}
this.files=function(){return that.current.map(function(song){return song.file});}
this.original=addIndices(this.original);this.trackNumber=this.original[this.startingTrack]._index;if(shuffleMode==true)
{this.current=clone(this.original);enableShuffle();}
else
{this.current=reorder(this.original,this.startingTrack);}}
var Gapless5=function(elem_id,options){this.tickMS=27;var SCRUB_RESOLUTION=65535;var SCRUB_WIDTH=0;var scrubPosition=0;var isScrubbing=false;var LOAD_TEXT="loading..."
var ERROR_TEXT="error!"
var initialized=false;var isMobileBrowser=window.mobilecheck();this.loop=(options!=null)&&(options.loop==true);this.useWebAudio=((options!=null)&&('useWebAudio'in options))?options.useWebAudio:true;this.useHTML5Audio=((options!=null)&&('useHTML5Audio'in options))?options.useHTML5Audio:!isMobileBrowser;this.id=Math.floor((1+Math.random())*0x10000);var context=gapless5AudioContext;var gainNode=(window.hasWebKit||(typeof AudioContext!="undefined"))?context.createGain():null;if(context&&gainNode)
{gainNode.connect(context.destination);}
this.trk=null;this.mgr=new Gapless5RequestManager(this);var inCallback=false;var firstUICallback=true;var that=this;var isPlayButton=true;var isShuffleActive=false;var keyMappings={};this.onprev=null;this.onplay=null;this.onpause=null;this.onstop=null;this.onnext=null;this.onshuffle=null;this.onerror=null;this.onfinishedtrack=null;this.onfinishedall=null;var getUIPos=function(){var position=isScrubbing?scrubPosition:that.mgr.sources[dispIndex()].getPosition();return(position/that.mgr.sources[dispIndex()].getLength())*SCRUB_RESOLUTION;};var getSoundPos=function(uiPosition){return((uiPosition/SCRUB_RESOLUTION)*that.mgr.sources[dispIndex()].getLength());};var numTracks=function(){if(that.trk!=null)
return that.trk.current.length;else
return 0;};var index=function(){if(that.trk!=null)
return that.trk.get();else
return-1;};var dispIndex=function(){if(readyToRemake())
return that.trk.previousItem;else if(that.trk!=null)
return that.trk.get();else
return-1;}
var readyToRemake=function(){if(that.trk.readyToRemake()!=null)
return that.trk.readyToRemake();else
return false;};var getFormattedTime=function(inMS){var minutes=Math.floor(inMS/60000);var seconds_full=(inMS-(minutes*60000))/1000;var seconds=Math.floor(seconds_full);var csec=Math.floor((seconds_full-seconds)*100);if(minutes<10){minutes="0"+minutes;}
if(seconds<10){seconds="0"+seconds;}
if(csec<10){csec="0"+csec;}
return minutes+':'+seconds+'.'+csec;};var getTotalPositionText=function(){var text=LOAD_TEXT;var srcLength=that.mgr.sources[dispIndex()].getLength();if(numTracks()==0)
{text=getFormattedTime(0);}
else if(that.mgr.sources[dispIndex()].getState()==Gapless5State.Error)
{text=ERROR_TEXT;}
else if(srcLength>0)
{text=getFormattedTime(srcLength);}
return text;};var runCallback=function(cb){if(cb)
{inCallback=true;cb();inCallback=false;}};var refreshTracks=function(newIndex){initialized=false;that.removeAllTracks();that.trk.rebasePlayList(newIndex);for(var i=0;i<numTracks();i++)
{that.addInitialTrack(that.trk.files()[i]);}
initialized=true;};this.totalTracks=function(){return numTracks();}
this.mapKeys=function(options){for(var key in options)
{var uppercode=options[key].toUpperCase().charCodeAt(0);var lowercode=options[key].toLowerCase().charCodeAt(0);var linkedfunc=null;var player=GAPLESS5_PLAYERS[that.id];switch(key)
{case "cue":linkedfunc=player.cue;break;case "play":linkedfunc=player.play;break;case "pause":linkedfunc=player.pause;break;case "playpause":linkedfunc=player.playpause;break;case "stop":linkedfunc=player.stop;break;case "prevtrack":linkedfunc=player.prevtrack;break;case "prev":linkedfunc=player.prev;break;case "next":linkedfunc=player.next;break;}
if(linkedfunc!=null)
{keyMappings[uppercode]=linkedfunc;keyMappings[lowercode]=linkedfunc;}}};this.setGain=function(uiPos){var normalized=uiPos/SCRUB_RESOLUTION;gainNode.gain.value=normalized;that.mgr.sources[dispIndex()].setGain(normalized);};this.scrub=function(uiPos){scrubPosition=getSoundPos(uiPos);$("#currentPosition"+that.id).html(getFormattedTime(scrubPosition));enableButton('prev',that.loop||(index()!=0||scrubPosition!=0));if(!isScrubbing)
{that.mgr.sources[dispIndex()].setPosition(scrubPosition,true);}};this.setLoadedSpan=function(percent)
{$("#loaded-span"+that.id).width(percent*SCRUB_WIDTH);if(percent==1)
{$("#totalPosition"+that.id).html(getTotalPositionText());}};this.onEndedCallback=function(){resetPosition();that.mgr.sources[dispIndex()].stop(true);if(that.loop||index()<numTracks()-1)
{that.next(true);runCallback(that.onfinishedtrack);}
else
{runCallback(that.onfinishedtrack);runCallback(that.onfinishedall);}};this.onStartedScrubbing=function(){isScrubbing=true;};this.onFinishedScrubbing=function(){isScrubbing=false;var newPosition=scrubPosition;if(that.mgr.sources[dispIndex()].inPlayState()&&newPosition>=that.mgr.sources[dispIndex()].getLength())
{that.next(true);}
else
{that.mgr.sources[dispIndex()].setPosition(newPosition,true);}};this.addInitialTrack=function(audioPath){var next=that.mgr.sources.length;that.mgr.sources[next]=new Gapless5Source(this,context,gainNode);that.mgr.loadQueue.push([next,audioPath]);if(that.mgr.loadingTrack==-1)
{that.mgr.dequeueNextLoad();}
if(initialized)
{updateDisplay();}};this.addTrack=function(audioPath){var next=that.mgr.sources.length;that.mgr.sources[next]=new Gapless5Source(this,context,gainNode);that.trk.add(next,audioPath);that.mgr.loadQueue.push([next,audioPath]);if(that.mgr.loadingTrack==-1)
{that.mgr.dequeueNextLoad();}
if(initialized)
{updateDisplay();}};this.insertTrack=function(point,audioPath){var trackCount=numTracks();point=Math.min(Math.max(point,0),trackCount);if(point==trackCount)
{that.addTrack(audioPath);}
else
{var oldPoint=point+1;that.mgr.sources.splice(point,0,new Gapless5Source(this,context,gainNode));that.trk.add(point,audioPath);for(var i in that.mgr.loadQueue)
{var entry=that.mgr.loadQueue[i];if(entry[0]>=point)
{entry[0]+=1;}}
that.mgr.loadQueue.splice(0,0,[point,audioPath]);updateDisplay();}};this.removeTrack=function(point){if(point<0||point>=that.mgr.sources.length)return;var curSource=that.mgr.sources[point];var wasPlaying=false;if(curSource.getState()==Gapless5State.Loading)
{curSource.cancelRequest();}
else if(curSource.getState()==Gapless5State.Play)
{wasPlaying=true;curSource.stop();}
var removeIndex=-1;for(var i in that.mgr.loadQueue)
{var entry=that.mgr.loadQueue[i];if(entry[0]==point)
{removeIndex=i;}
else if(entry[0]>point)
{entry[0]-=1;}}
if(removeIndex>=0)
{that.mgr.loadQueue.splice(removeIndex,1);}
that.mgr.sources.splice(point,1);that.trk.remove(point);if(that.mgr.loadingTrack==point)
{that.mgr.dequeueNextLoad();}
if(point==that.trk.currentItem)
{that.next();if(wasPlaying)
that.play();}
if(initialized)
{updateDisplay();}};this.replaceTrack=function(point,audioPath){that.removeTrack(point);that.insertTrack(point,audioPath);}
this.removeAllTracks=function(){for(var i in that.mgr.sources)
{if(that.mgr.sources[i].getState()==Gapless5State.Loading)
{that.mgr.sources[i].cancelRequest();}
that.mgr.sources[i].stop();}
that.mgr.loadingTrack=-1;that.mgr.sources=[];that.mgr.loadQueue=[];if(initialized)
{updateDisplay();}};this.shuffleToggle=function(){if(isShuffleActive==false)return;that.trk.shuffleToggle();if(initialized)
{updateDisplay();}};this.gotoTrack=function(newIndex,bForcePlay){if(inCallback)return;var justRemade=false;if(readyToRemake()==true){refreshTracks(newIndex);justRemade=true;}
var trackDiff=newIndex-index();if(trackDiff==0&&justRemade==false)
{resetPosition();if((bForcePlay==true)||that.mgr.sources[index()].isPlayActive())
{that.mgr.sources[newIndex].play();}}
else if(justRemade==true){that.trk.set(newIndex);that.mgr.sources[newIndex].load(that.trk.files()[newIndex]);that.mgr.sources[newIndex].play();updateDisplay();}
else
{var oldIndex=index();that.trk.set(newIndex);if(that.mgr.sources[oldIndex].getState()==Gapless5State.Loading)
{that.mgr.sources[oldIndex].cancelRequest();that.mgr.loadQueue.push([oldIndex,that.trk.files()[oldIndex]]);}
resetPosition(true);if(that.mgr.sources[newIndex].getState()==Gapless5State.None)
{that.mgr.sources[newIndex].load(that.trk.files()[newIndex]);for(var i in that.mgr.loadQueue)
{var entry=that.mgr.loadQueue.shift();if(entry[0]==newIndex)
{break;}
that.mgr.loadQueue.push(entry);}}
updateDisplay();if((bForcePlay==true)||that.mgr.sources[oldIndex].isPlayActive())
{that.mgr.sources[newIndex].play();}
that.mgr.sources[oldIndex].stop();}
enableButton('prev',that.loop||(newIndex>0));enableButton('next',that.loop||(newIndex<numTracks()-1));};this.prevtrack=function(e){if(that.mgr.sources.length==0)return;if(index()>0)
{that.gotoTrack(index()-1);runCallback(that.onprev);}
else if(that.loop)
{that.gotoTrack(numTracks()-1);runCallback(that.onprev);}};this.prev=function(e){if(that.mgr.sources.length==0)return;if(readyToRemake()==true)
{that.gotoTrack(0);}
else if(that.mgr.sources[index()].getPosition()>0)
{that.gotoTrack(index());}
else if(index()>0)
{that.gotoTrack(index()-1);runCallback(that.onprev);}
else if(that.loop)
{that.gotoTrack(numTracks()-1);runCallback(that.onprev);}};this.next=function(e){if(that.mgr.sources.length==0)return;var bForcePlay=(e==true);if(index()<numTracks()-1)
{that.gotoTrack(index()+1,bForcePlay);runCallback(that.onnext);}
else if(that.loop)
{that.gotoTrack(0,bForcePlay);runCallback(that.onnext);}};this.play=function(e){if(that.mgr.sources.length==0)return;if(that.mgr.sources[dispIndex()].audioFinished)
{that.next(true);}
else
{that.mgr.sources[dispIndex()].play();}
runCallback(that.onplay);};this.playpause=function(e){if(isPlayButton)
that.play(e);else
that.pause(e);}
this.cue=function(e){if(!isPlayButton)
{that.prev(e);}
else if(that.mgr.sources[dispIndex()].getPosition()>0)
{that.prev(e);that.play(e);}
else
{that.play(e);}}
this.pause=function(e){if(that.mgr.sources.length==0)return;that.mgr.sources[dispIndex()].stop();runCallback(that.onpause);};this.stop=function(e){if(that.mgr.sources.length==0)return;resetPosition();that.mgr.sources[dispIndex()].stop(true);runCallback(that.onstop);};this.isPlaying=function(){return that.mgr.sources[dispIndex()].inPlayState();};var resetPosition=function(forceScrub){if(!forceScrub&&that.mgr.sources[dispIndex()].getPosition()==0)return;that.scrub(0);$("#transportbar"+that.id).val(0);};var enableButton=function(buttonId,bEnable){if(bEnable)
{$("#"+buttonId+that.id).removeClass('disabled');$("#"+buttonId+that.id).addClass('enabled');}
else
{$("#"+buttonId+that.id).removeClass('enabled');$("#"+buttonId+that.id).addClass('disabled');}};var shuffleButton=function(mode,bEnable){var oldButtonClass="";var newButtonClass="";if(mode=="shuffle")
{oldButtonClass="g5unshuffle";newButtonClass="g5shuffle";}
else
{oldButtonClass="g5shuffle";newButtonClass="g5unshuffle";}
$("#"+"shuffle"+that.id).removeClass(oldButtonClass);$("#"+"shuffle"+that.id).addClass(newButtonClass);enableButton('shuffle',bEnable);};var updateDisplay=function(){if(numTracks()==0)
{$("#trackIndex"+that.id).html(0);$("#tracks"+that.id).html(0);$("#totalPosition"+that.id).html("00:00.00");enableButton('prev',false);shuffleButton('shuffle',false);enableButton('next',false);}
else
{$("#trackIndex"+that.id).html(that.trk.trackNumber);$("#tracks"+that.id).html(that.trk.current.length);$("#totalPosition"+that.id).html(getTotalPositionText());enableButton('prev',that.loop||index()>0||that.mgr.sources[index()].getPosition()>0);enableButton('next',that.loop||index()<numTracks()-1);if(that.mgr.sources[dispIndex()].inPlayState())
{enableButton('play',false);isPlayButton=false;}
else
{enableButton('play',true);isPlayButton=true;if(that.mgr.sources[dispIndex()].getState()==Gapless5State.Error)
{runCallback(that.onerror);}}
if(that.trk.current.length>2)
isShuffleActive=true;if(that.trk.shuffled())
shuffleButton('unshuffle',isShuffleActive);else
shuffleButton('shuffle',isShuffleActive);that.mgr.sources[index()].uiDirty=false;}};var Tick=function(tickMS){if(numTracks()>0)
{that.mgr.sources[dispIndex()].tick();if(that.mgr.sources[dispIndex()].uiDirty)
{updateDisplay();}
if(that.mgr.sources[dispIndex()].inPlayState())
{var soundPos=that.mgr.sources[dispIndex()].getPosition();if(isScrubbing)
{soundPos=scrubPosition;}
$("#transportbar"+that.id).val(getUIPos());$("#currentPosition"+that.id).html(getFormattedTime(soundPos));}}
window.setTimeout(function(){Tick(tickMS);},tickMS);};var PlayerHandle=function(){return "GAPLESS5_PLAYERS["+that.id+"]";};var Init=function(elem_id,options,tickMS){if($("#"+elem_id).length==0)
{console.log("ERROR in Gapless5: no element with id '"+elem_id+"' exists!");return;}
GAPLESS5_PLAYERS[that.id]=that;player_html='<div class="g5position">';player_html+='<span id="currentPosition'+that.id+'">00:00.00</span> | <span id="totalPosition'+that.id+'">'+LOAD_TEXT+'</span>';player_html+=' | <span id="trackIndex'+that.id+'">1</span>/<span id="tracks'+that.id+'">1</span>';player_html+='</div>';player_html+='<div class="g5inside">';if(typeof Audio=="undefined")
{player_html+='This player is not supported by your browser.';player_html+='</div>';$("#"+elem_id).html(player_html);return;}
player_html+='<div class="g5transport">';player_html+='<div class="g5meter"><span id="loaded-span'+that.id+'" style="width: 0%"></span></div>';player_html+='<input type="range" class="transportbar" name="transportbar" id="transportbar'+that.id+'" ';player_html+='min="0" max="'+SCRUB_RESOLUTION+'" value="0" oninput="'+PlayerHandle()+'.scrub(this.value);" ';player_html+='onmousedown="'+PlayerHandle()+'.onStartedScrubbing();" ontouchstart="'+PlayerHandle()+'.onStartedScrubbing();" ';player_html+='onmouseup="'+PlayerHandle()+'.onFinishedScrubbing();" ontouchend="'+PlayerHandle()+'.onFinishedScrubbing();" />';player_html+='</div>';player_html+='<div class="g5buttons" id="g5buttons'+that.id+'">';if(isMobileBrowser)
{player_html+='<button class="g5button volumedisabled" />';player_html+='</div>';}
else
{player_html+='<input type="range" class="volume" name="gain" min="0" max="'+SCRUB_RESOLUTION+'" value="'+SCRUB_RESOLUTION+'" oninput="'+PlayerHandle()+'.setGain(this.value);" />';player_html+='</div>';}
player_html+='</div>';$("#"+elem_id).html(player_html);if(!isMobileBrowser&&navigator.userAgent.indexOf('Mac OS X')==-1)
{$("#transportbar"+that.id).addClass("g5meter-1pxup");$("#g5buttons"+that.id).addClass("g5buttons-1pxup");}
if(isMobileBrowser)
{$("#transportbar"+that.id).addClass("g5transport-1pxup");}
if(options!=null&&'mapKeys'in options)
{that.mapKeys(options['mapKeys']);}
$(window).keydown(function(e){var keycode=e.keyCode;if(keycode in keyMappings)
{keyMappings[keycode](e);}});enableButton('play',true);enableButton('stop',true);if((options!=null)&&('shuffleButton'in options)&&(options.shuffleButton!=true))
{var transSize="111px";var playSize="115px";$("input[type='range'].transportbar").css("width",transSize);$(".g5meter").css("width",transSize);$(".g5position").css("width",playSize);$(".g5inside").css("width",playSize);$("#shuffle"+that.id).remove();}
SCRUB_WIDTH=$("#transportbar"+that.id).width();var shuffleInit=((options!=null)&&('shuffle'in options)&&(options.shuffle==true))
if(options!=null&&'startingTrack'in options)
{if(typeof options.startingTrack=='number')
{that.startingTrack=options.startingTrack;}
else if((typeof options.startingTrack=='string')&&(options.startingTrack=="random"))
{that.startingTrack="random";}}
if(options!=null&&'tracks'in options)
{if(typeof options.tracks=='string')
{var items=[{}];items[0].file=options.tracks;that.trk=new Gapless5FileList(items,0,false);that.addInitialTrack(that.trk.files()[0]);}
else if(typeof options.tracks[0]=='string')
{var items=[];for(var i=0;i<options.tracks.length;i++)
{items[i]={};items[i].file=options.tracks[i];}
that.trk=new Gapless5FileList(items,0,shuffleInit);for(var i=0;i<that.trk.files().length;i++)
that.addInitialTrack(that.trk.files()[i]);}
else if(typeof options.tracks[0]=='object')
{that.trk=new Gapless5FileList(options.tracks,that.startingTrack,shuffleInit);for(var i=0;i<that.trk.files().length;i++)
that.addInitialTrack(that.trk.files()[i]);}}
initialized=true;updateDisplay();var playOnLoad=(options!=undefined)&&('playOnLoad'in options)&&(options.playOnLoad==true);if(playOnLoad&&(that.trk.current.length>0))
{that.mgr.sources[index()].play();}
Tick(tickMS);};$(document).ready(Init(elem_id,options,this.tickMS));};