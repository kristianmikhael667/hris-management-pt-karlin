
<div class="content-wrapper">
    <div class="container-fluid">
    <?php echo $this->session->flashdata('pesan') ?>
        <div class="card mb-3 mt-3">
            <div class="card-header">
                <i class="fas fa-table"></i>
                Absensi Wajah
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <div class="jumbotron bg-success">
                        <div class="container">
                            <h1 class="display-4 text-white">ABSENSI WAJAH KARYAWAN</h1>
                            <p class="lead text-center text-white">Silahkan Masukkan Wajah Anda Pada Button Camera</p>
                        </div>
                    </div>
                </div>
                <button class="btn btn-lg btn-primary mb-2" data-toggle="modal" data-target="#opencamera" name=""><i class="fa fa-camera" aria-hidden="true"></i>
 Open Camera </button>
            </div>
            <!-- Modal -->
            <div class="modal fade" id="opencamera" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Absensi Karyawan</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                        <style>
                                h1,h2,p,a{
                                    font-family: sans-serif;
                                    font-weight: normal;
                                }
                            
                                .jam-digital-malasngoding {
                                    overflow: hidden;
                                    width: 100px;
                                    margin-left: 10px;
                                    border: 5px solid #efefef;
                                }
                                .kotak{
                                    float: left;
                                    width: 30px;
                                    height: 45px;
                                    background-color: #00FF00	;
                                }
                                .jam-digital-malasngoding p {
                                    color: #fff;
                                    font-size: 20px;
                                    text-align: center;
                                    margin-top: 10px;
                                }                       
                            
                            </style>
                            
                            <div class="jam-digital-malasngoding">
                                <div class="kotak">
                                    <p id="jam"> : </p>
                                </div>
                                <div class="kotak">
                                    <p id="menit"> : </p>
                                </div>
                                <div class="kotak">
                                    <p id="detik"> : </p>
                                </div>
                            </div>

                            <script>
                                window.setTimeout("waktu()", 1000);
                            
                                function waktu() {
                                    var waktu = new Date();
                                    setTimeout("waktu()", 1000);
                                    document.getElementById("jam").innerHTML = waktu.getHours();
                                    document.getElementById("menit").innerHTML = waktu.getMinutes();
                                    document.getElementById("detik").innerHTML = waktu.getSeconds();
                                }
                            </script>
                        </div>
                        <div class="modal-body">

                        <?php $session_value = $this->session->userdata('id_karyawan');
                        $cek_query = $this->model_auth->check_employe($session_value); 
                                foreach ($cek_query->result_array() as $row)
                                {       
                            ?><?php echo $row['nama_karyawan'] ; ?> 
                        <?php } ?>
                        <br>
                        <!DOCTYPE html>
                        <html>

                        <head>
                            <script async src="<?php echo base_url() ?>assets/js/opencv.js" type="text/javascript"></script>
                            <script src="<?php echo base_url() ?>assets/js/utils.js" type="text/javascript"></script>

                            <script type='text/javascript'>
                            var netDet = undefined, netRecogn = undefined;
                            var persons = {};

                            //! [Run face detection model]
                            function detectFaces(img) {
                            var blob = cv.blobFromImage(img, 1, {width: 192, height: 144}, [104, 117, 123, 0], false, false);
                        netDet.setInput(blob);
                        var out = netDet.forward();

                        var faces = [];
                        for (var i = 0, n = out.data32F.length; i < n; i += 7) {
                            var confidence = out.data32F[i + 2];
                            var left = out.data32F[i + 3] * img.cols;
                            var top = out.data32F[i + 4] * img.rows;
                            var right = out.data32F[i + 5] * img.cols;
                            var bottom = out.data32F[i + 6] * img.rows;
                            left = Math.min(Math.max(0, left), img.cols - 1);
                            right = Math.min(Math.max(0, right), img.cols - 1);
                            bottom = Math.min(Math.max(0, bottom), img.rows - 1);
                            top = Math.min(Math.max(0, top), img.rows - 1);

                            if (confidence > 0.5 && left < right && top < bottom) {
                            faces.push({x: left, y: top, width: right - left, height: bottom - top})
                            }
                        }
                        blob.delete();
                        out.delete();
                        return faces;
                        };
                        //! [Run face detection model]

                        //! [Get 128 floating points feature vector]
                        function face2vec(face) {
                        var blob = cv.blobFromImage(face, 1.0 / 255, {width: 96, height: 96}, [0, 0, 0, 0], true, false)
                        netRecogn.setInput(blob);
                        var vec = netRecogn.forward();
                        blob.delete();
                        return vec;
                        };
                        //! [Get 128 floating points feature vector]

                        //! [Recognize]
                        function recognize(face) {
                        var vec = face2vec(face);
                        <?php
                        $cek_query = $this->model_auth->check_employe($session_value); 
                                foreach ($cek_query->result_array() as $row)
                                {       
                            ?> 
                        
                        var bestMatchName = '<?php echo $row['nama_karyawan'] ;?>';
                        <?php } ?>
                        var bestMatchScore = 0.5;  // Actually, the minimum is -1 but we use it as a threshold.
                        for (name in persons) {
                            var personVec = persons[name];
                            var score = vec.dot(personVec);
                            if (score > bestMatchScore) {
                            bestMatchScore = score;
                            bestMatchName = name;
                            }
                        }

                        vec.delete();
                        return bestMatchName;
                        };
                        //! [Recognize]

                        function loadModels(callback) {
                        var utils = new Utils('');
                        var proto = 'https://raw.githubusercontent.com/opencv/opencv/master/samples/dnn/face_detector/deploy_lowres.prototxt';
                        var weights = '<?php echo base_url() ?>assets/res10_300x300_ssd_iter_140000_fp16.caffemodel';
                        var recognModel = '<?php echo base_url() ?>assets/face_recognition.t7';
                            
                        utils.createFileFromUrl('face_detector.prototxt', proto, () => {
                            document.getElementById('status').innerHTML = 'Downloading face_detector.caffemodel';
                            utils.createFileFromUrl('face_detector.caffemodel', weights, () => {
                            document.getElementById('status').innerHTML = 'Downloading OpenFace model';
                            utils.createFileFromUrl('face_recognition.t7', recognModel, () => {
                                document.getElementById('status').innerHTML = '';
                                netDet = cv.readNetFromCaffe('face_detector.prototxt', 'face_detector.caffemodel');
                                netRecogn = cv.readNetFromTorch('face_recognition.t7');
                                callback();
                            });
                            });
                        });
                        };

                        function main() {
                        // Create a camera object.
                        var output = document.getElementById('output');
                        var camera = document.createElement("video");
                        camera.setAttribute("width", output.width);
                        camera.setAttribute("height", output.height);

                        // Get a permission from user to use a camera.
                        navigator.mediaDevices.getUserMedia({video: true, audio: false})
                            .then(function(stream) {
                            camera.srcObject = stream;
                            camera.onloadedmetadata = function(e) {
                                camera.play();
                            };
                        });

                        //! [Open a camera stream]
                        var cap = new cv.VideoCapture(camera);
                        var frame = new cv.Mat(camera.height, camera.width, cv.CV_8UC4);
                        var frameBGR = new cv.Mat(camera.height, camera.width, cv.CV_8UC3);
                        //! [Open a camera stream]

                        //! [Add a person]
                        document.getElementById('addPersonButton').onclick = function() {
                            var rects = detectFaces(frameBGR);
                            if (rects.length > 0) {
                            var face = frameBGR.roi(rects[0]);

                            // var name = prompt('Say your name:');
                            // var cell = document.getElementById("targetNames").insertCell(0); //insert nama
                            // cell.innerHTML = name; //dipanggil namanya kesini

                            

                            // persons[name] = face2vec(face).clone();

                            // var canvas = document.createElement("canvas");
                            // canvas.setAttribute("width", 96);
                            // canvas.setAttribute("height", 96);
                            // var cell = document.getElementById("targetImgs").insertCell(0);
                            // cell.appendChild(canvas);

                            var faceResized = new cv.Mat(canvas.height, canvas.width, cv.CV_8UC3);
                            cv.resize(face, faceResized, {width: canvas.width, height: canvas.height});
                            cv.cvtColor(faceResized, faceResized, cv.COLOR_BGR2RGB);
                            cv.imshow(canvas, faceResized);
                            faceResized.delete();
                            }
                        };
                        //! [Add a person]

                        //! [Define frames processing]
                        var isRunning = false;
                        const FPS = 30;  // Target number of frames processed per second.
                        function captureFrame() {
                            var begin = Date.now();
                            cap.read(frame);  // Read a frame from camera
                            cv.cvtColor(frame, frameBGR, cv.COLOR_RGBA2BGR);

                            var faces = detectFaces(frameBGR);
                            faces.forEach(function(rect) {
                            cv.rectangle(frame, {x: rect.x, y: rect.y}, {x: rect.x + rect.width, y: rect.y + rect.height}, [0, 255, 0, 255]);

                            var face = frameBGR.roi(rect);
                            var name = recognize(face);
                            cv.putText(frame, name, {x: rect.x, y: rect.y}, cv.FONT_HERSHEY_SIMPLEX, 1.0, [0, 255, 0, 255]);
                            });

                            cv.imshow(output, frame);

                            // Loop this function.
                            if (isRunning) {
                            var delay = 1000 / FPS - (Date.now() - begin);
                            setTimeout(captureFrame, delay);
                            }
                        };
                        //! [Define frames processing]

                        document.getElementById('startStopButton').onclick = function toggle() {
                            if (isRunning) {
                            isRunning = false;
                            document.getElementById('startStopButton').innerHTML = 'Start';
                            document.getElementById('addPersonButton').disabled = true;
                            } else {
                            function run() {
                                isRunning = true;
                                captureFrame();
                                document.getElementById('startStopButton').innerHTML = 'Stop';
                                document.getElementById('startStopButton').disabled = false;
                                document.getElementById('addPersonButton').disabled = false;
                            }
                            if (netDet == undefined || netRecogn == undefined) {
                                document.getElementById('startStopButton').disabled = true;
                                loadModels(run);  // Load models and run a pipeline;
                            } else {
                                run();
                            }
                            }
                        };

                        document.getElementById('startStopButton').disabled = false;
                        };
                        </script>

                        </head>

                        <body onload="cv['onRuntimeInitialized']=()=>{ main() }">
                        <button id="startStopButton" type="button" disabled="true" class="btn btn-primary">Aktifkan Camera</button>
                        <div id="status"></div>
                        <canvas id="output" width=640 height=480 style="max-width: 100%"></canvas>

                        <table>
                            <tr id="targetImgs"></tr>
                            <tr id="targetNames"></tr>
                        </table>
                        <form action="<?php echo base_url()?>user/kehadiran/absen" method="post" enctype="multipart/form-data">
                            <button id="addPersonButton" type="submit" disabled="true" class="btn btn-success">ABSEN</button>
                        </form>
                        
                        </body>

                        </html>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
