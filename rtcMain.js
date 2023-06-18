'use strict';
//엄격모드를 활성화 하는 디렉티브?? 

//미디어 스티림 상수 및 매개변수를 설정한다.
//일단 동영상만 스티리밍 할 수 잇도록 true를 준다.
const mediaStreamConstraints = {
  video: true,
};

// 비디오만 교환하도록 설정한다.
const offerOptions = {
  offerToReceiveVideo: 1,
};

// 통화 초기 시작 간 정의하는 부분(피어간 연결로 정으)
let startTime = null;


//스트림이 배치될 비디오 요소.
const localVideo = document.getElementById('localVideo');
const remoteVideo = document.getElementById('remoteVideo');

//비디오에서 재생될 로컬 스트림.
//스트림은 데이터를 연속적인 흐름을 나타내는 개념인데
//오디오나 비디오의 데이터를 연속적으로 재생하는데 사용한다.
let localStream;
let remoteStream;

let localPeerConnection;
let remotePeerConnection;



// mediastram 콜백을 정의한다.
// mediastream 비디오 요소 src로 설정한다.
//비디오 요소에 mediastream을 추가해서 성공을 처리한다.?? 
function gotLocalMediaStream(mediaStream) {
  localVideo.srcObject = mediaStream;
  localStream = mediaStream;
  trace('Received local stream.');
  callButton.disabled = false;  
  //통화 버튼을 활성화 하는 부분.
}

//콘솔에 메세지를 기록해서 오류를 처러하는 부분.
function handleLocalMediaStreamError(error) {
  trace(`navigator.getUserMedia error: ${error.toString()}.`);
}

//remoteVideo에 src를 추하여 원격 mediastream 실행할 수 있게 처리한다.
function gotRemoteMediaStream(event) {
  const mediaStream = event.stream;
  remoteVideo.srcObject = mediaStream;
  remoteStream = mediaStream;
  trace('Remote peer connection received remote stream.');
}

//비디오스트림에 대한 동작을 추가한다.
//비디오 요소의 id와 크기로 메세지를 기록한다. 
function logVideoLoaded(event) {
  const video = event.target;
  trace(`${video.id} videoWidth: ${video.videoWidth}px, ` +
        `videoHeight: ${video.videoHeight}px.`);
}


// 동영상 스트리밍이 시작되면 동영상 요소의 id와 크기를 메세지로 기록한다.
function logResizedVideo(event) {
  logVideoLoaded(event);
    const elapsedTime = window.performance.now() - startTime;
    startTime = null;
    trace(`Setup time: ${elapsedTime.toFixed(3)}ms.`);
  
}


  localVideo.addEventListener('loadedmetadata', logVideoLoaded);
  remoteVideo.addEventListener('loadedmetadata', logVideoLoaded);
  remoteVideo.addEventListener('onresize', logResizedVideo);

//rtc 피어 연결 동작을 말한다. 
//새로운 피어 후보와 연결한다.
function handleConnection(event) {
  const peerConnection = event.target;
  const iceCandidate = event.candidate;
  if (iceCandidate) {
    const newIceCandidate = new RTCIceCandidate(iceCandidate);
    const otherPeer = getOtherPeer(peerConnection);

    otherPeer.addIceCandidate(newIceCandidate)
      .then(() => {
        handleConnectionSuccess(peerConnection);
      }).catch((error) => {
        handleConnectionFailure(peerConnection, error);
      });

    trace(`${getPeerName(peerConnection)} ICE candidate:\n` +
          `${event.candidate.candidate}.`);
  }
}

//연결 성공을 기록하는 부분.

function handleConnectionSuccess(peerConnection) {
  trace(`${getPeerName(peerConnection)} addIceCandidate success.`);
};

//연결 실패를 기록하는 부분.
function handleConnectionFailure(peerConnection, error) {
  trace(`${getPeerName(peerConnection)} failed to add ICE Candidate:\n`+
        `${error.toString()}.`);
}

//연결 상태 변경 사항을 기록하는 부분.
function handleConnectionChange(event) {
  const peerConnection = event.target;
  console.log('ICE state change event: ', event);
  trace(`${getPeerName(peerConnection)} ICE state: ` +
        `${peerConnection.iceConnectionState}.`);
}

//세션 설명 설정 실패시 오류를 기록하는 부분.
function setSessionDescriptionError(error) {
  trace(`Failed to create session description: ${error.toString()}.`);
}

//세션 설명을 설정할 때 성공을 기록하는 부분.
function setDescriptionSuccess(peerConnection, functionName) {
  const peerName = getPeerName(peerConnection);
  trace(`${peerName} ${functionName} complete.`);
}

//localDescriptiondl 설정되면 성공을 기록한다.
function setLocalDescriptionSuccess(peerConnection) {
  setDescriptionSuccess(peerConnection, 'setLocalDescription');
}

//remoteDescription이 설정되면 성공을 기록한다.
function setRemoteDescriptionSuccess(peerConnection) {
  setDescriptionSuccess(peerConnection, 'setRemoteDescription');
}

//로그는 생성을 제안하고 피어 연결 세션을 설정한다.
function createdOffer(description) {
  trace(`Offer from localPeerConnection:\n${description.sdp}`);

  trace('localPeerConnection setLocalDescription start.');
  localPeerConnection.setLocalDescription(description)
    .then(() => {
      setLocalDescriptionSuccess(localPeerConnection);
    }).catch(setSessionDescriptionError);

  trace('remotePeerConnection setRemoteDescription start.');
  remotePeerConnection.setRemoteDescription(description)
    .then(() => {
      setRemoteDescriptionSuccess(remotePeerConnection);
    }).catch(setSessionDescriptionError);

  trace('remotePeerConnection createAnswer start.');
  remotePeerConnection.createAnswer()
    .then(createdAnswer)
    .catch(setSessionDescriptionError);
}

//제안 생성에 대한 응답을 기록하고 피어 연결 세션을 설정한다.
function createdAnswer(description) {
  trace(`Answer from remotePeerConnection:\n${description.sdp}.`);

  trace('remotePeerConnection setLocalDescription start.');
  remotePeerConnection.setLocalDescription(description)
    .then(() => {
      setLocalDescriptionSuccess(remotePeerConnection);
    }).catch(setSessionDescriptionError);

  trace('localPeerConnection setRemoteDescription start.');
  localPeerConnection.setRemoteDescription(description)
    .then(() => {
      setRemoteDescriptionSuccess(localPeerConnection);
    }).catch(setSessionDescriptionError);
}

//버튼 동작을 정의하고 추가한다.
const startButton = document.getElementById('startButton');
const callButton = document.getElementById('callButton');
const hangupButton = document.getElementById('hangupButton');

//통화 및 끊기를 비활성화 한다.
callButton.disabled = true;
hangupButton.disabled = true;

//시작 버튼 동작 처리 로컬 mediastram 생성한다.
function startAction() {
  navigator.mediaDevices.getUserMedia(mediaStreamConstraints)
    .then(gotLocalMediaStream).catch(handleLocalMediaStreamError);
  trace('Requesting local stream.');
}

//통화 버튼 동작 처리. 피어 연결을 생성한다.
function callAction() {
  callButton.disabled = true;
  hangupButton.disabled = false;
  trace('Starting call.');
  startTime = window.performance.now();

//로컬 미디어 스트림 트랙을 가져온다.
const videoTracks = localStream.getVideoTracks();
  const audioTracks = localStream.getAudioTracks();

  if (videoTracks.length > 0) {
    trace(`Using video device: ${videoTracks[0].label}.`);
  }
  if (audioTracks.length > 0) {
    trace(`Using audio device: ${audioTracks[0].label}.`);
  }

  //rtc 서버 구성을 허용한다.
  const servers = null;


  localPeerConnection.addEventListener('icecandidate', handleConnection);
  localPeerConnection.addEventListener(
    'iceconnectionstatechange', handleConnectionChange);

  remotePeerConnection = new RTCPeerConnection(servers);
  trace('Created remote peer connection object remotePeerConnection.');

  remotePeerConnection.addEventListener('icecandidate', handleConnection);
  remotePeerConnection.addEventListener(
    'iceconnectionstatechange', handleConnectionChange);
  remotePeerConnection.addEventListener('addstream', gotRemoteMediaStream);

  // Add local stream to connection and create offer to connect.
  localPeerConnection.addStream(localStream);
  trace('Added local stream to localPeerConnection.');

  trace('localPeerConnection createOffer start.');
  localPeerConnection.createOffer(offerOptions)
    .then(createdOffer).catch(setSessionDescriptionError);
}

//전화 끊기 작업. 통화 종료, 연결 종료 및 피어 재설정
function hangupAction() {
  localPeerConnection.close();
  remotePeerConnection.close();
  localPeerConnection = null;
  remotePeerConnection = null;
  hangupButton.disabled = true;
  callButton.disabled = false;
  trace('Ending call.');
}

//버튼 클릭에 이벤트를 처리한다.
startButton.addEventListener('click', startAction);
callButton.addEventListener('click', callAction);
hangupButton.addEventListener('click', hangupAction);

//다른 피어 연결을 가져온다.
function getOtherPeer(peerConnection) {
  return (peerConnection === localPeerConnection) ?
      remotePeerConnection : localPeerConnection;
}

//특정 피어 연결의 이름을 가져온다.
function getPeerName(peerConnection) {
  return (peerConnection === localPeerConnection) ?
      'localPeerConnection' : 'remotePeerConnection';
}

//작업과 콘솔에서 발생한 시간을 기록한다.
function trace(text) {
  text = text.trim();
  const now = (window.performance.now() / 1000).toFixed(3);

  console.log(now, text);
}