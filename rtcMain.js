//스트림이 배치될 비디오 요소.
const localVideo = document.querySelector('video');

//비디오에서 재생될 로컬 스트림.
//스트림은 데이터를 연속적인 흐름을 나타내는 개념인데
//오디오나 비디오의 데이터를 연속적으로 재생하는데 사용한다.
let localStream;

//비디오 요소에 mediastream을 추가해서 성공을 처리한다.?? 
function gotLocalMediaStream(mediaStream) {
    localStream = mediaStream;
    localVideo.srcObject = mediaStream;
  }