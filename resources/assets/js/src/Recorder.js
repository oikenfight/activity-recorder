export default class Recorder {
    constructor () {
        console.log('this is src/Recorder class.')
        this.localStream = null
        this.recorder =  null
        this.videoBlob = null
    }

    // カメラ使用準備。Index component をマウントした時に一度だけ呼ばれる
    init () {
        // DOM を取得（ここに書きたくないね。。余裕があれば。）
        let localVideo =  document.getElementById('local_video')
        console.log(localVideo)

        let constraints = {
            audio: false, // 音声はいらない
            video: {
                facingMode: 'environment' // スマホのバックカメラを使用
            }
        };

        // stream（動画）を取得
        navigator.mediaDevices.getUserMedia(constraints)
            .then((stream) => {
                this.localStream  = stream;
                localVideo.src = window.URL.createObjectURL(stream);
            })
            .catch((err) => {
                window.alert(err.name + ': ' + err.message);
            });
    }

    // 録画開始
    start() {
        if (! this.localStream) {
            console.warn("no stream");
            return;
        }
        if (this.recorder) {
            console.warn("recorder already exist");
            return;
        }

        let self = this
        this.recorder = new MediaRecorder(this.localStream);
        this.recorder.ondataavailable = function(evt) {
            // 録画が終了したタイミングで呼び出される
            console.log("data available, start playback");
            let videoBlob = new Blob([evt.data], { type: evt.data.type });
            let blobUrl = window.URL.createObjectURL(videoBlob);
            self.setVideoBlob(videoBlob)
            self.setPlayBlobUrl(blobUrl)
        }

        // 録画開始
        this.recorder.start();
        console.log("start recording");
    }

    // 録画停止
    stop() {
        if (this.recorder) {
            this.recorder.stop()   // ストップすると ondataavailable コールバックが呼び出される
            console.log("stop recording")
        }
    }

    setVideoBlob (videoBlob) {
        console.log('here is setVideoBlob method')
        this.videoBlob = videoBlob
    }

    getVideoBlob () {
        if (this.videoBlob) {
            return this.videoBlob
        }
    }

    // 撮影したものを再生
    setPlayBlobUrl (blobUrl) {
        console.log('here is setPlayUrl method')
        let playbackVideo =  document.getElementById('playback_video')
        if (blobUrl) {
            playbackVideo.src = blobUrl;
        }
    }

    // 録画したものをクリア
    clear () {
        this.localStream = null
        this.recorder = null
        this.videoBlob = null
    }

}
