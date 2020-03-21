"use strict";

//var myDropzone = new Dropzone("div#myFile", { url: "/file/post"});
//console.log(myDropzone);
//$("div#myFile").dropzone({ url: "/file/post" });
var KTDropzoneDemo = function () {    
    // Private functions
    var demos = function () {
        // single file upload
        Dropzone.options.kDropzoneOne = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 1,
            maxFilesize: 5, // MB
            addRemoveLinks: true,
            accept: function(file, done) {
				alert("one");
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };

        // multiple file upload
        Dropzone.options.kDropzoneTwo = {
            paramName: "file11", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
			  init: function(e) {
				  console.log(e);
				this.on("error", function(file) { alert("Added file."); });
			  },
            accept: function(file, done) {
				alert("two");
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };

        // file type validation
        Dropzone.options.kDropzoneThree = {
            paramName: "file", // The name that will be used to transfer the file
            maxFiles: 10,
            maxFilesize: 10, // MB
            addRemoveLinks: true,
            acceptedFiles: "image/*,application/pdf,.psd",
            accept: function(file, done) {
				alert("three");
                if (file.name == "justinbieber.jpg") {
                    done("Naha, you don't.");
                } else { 
                    done(); 
                }
            }   
        };
    }

    return {
        // public functions
        init: function() {
            demos(); 
        }
    };
}();

KTDropzoneDemo.init();
console.log(Dropzone.options);