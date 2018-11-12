(function(e){function t(t){for(var n,s,u=t[0],l=t[1],a=t[2],c=0,m=[];c<u.length;c++)s=u[c],i[s]&&m.push(i[s][0]),i[s]=0;for(n in l)Object.prototype.hasOwnProperty.call(l,n)&&(e[n]=l[n]);d&&d(t);while(m.length)m.shift()();return r.push.apply(r,a||[]),o()}function o(){for(var e,t=0;t<r.length;t++){for(var o=r[t],n=!0,u=1;u<o.length;u++){var l=o[u];0!==i[l]&&(n=!1)}n&&(r.splice(t--,1),e=s(s.s=o[0]))}return e}var n={},i={app:0},r=[];function s(t){if(n[t])return n[t].exports;var o=n[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,s),o.l=!0,o.exports}s.m=e,s.c=n,s.d=function(e,t,o){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},s.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(s.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var n in e)s.d(o,n,function(t){return e[t]}.bind(null,n));return o},s.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="/";var u=window["webpackJsonp"]=window["webpackJsonp"]||[],l=u.push.bind(u);u.push=t,u=u.slice();for(var a=0;a<u.length;a++)t(u[a]);var d=l;r.push([0,"chunk-vendors"]),o()})({0:function(e,t,o){e.exports=o("56d7")},"034f":function(e,t,o){"use strict";var n=o("c21b"),i=o.n(n);i.a},"1d82":function(e,t,o){"use strict";var n=o("2652"),i=o.n(n);i.a},2652:function(e,t,o){},"56d7":function(e,t,o){"use strict";o.r(t);o("cadf"),o("551c"),o("097d");var n=o("2b0e"),i=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{attrs:{id:"app"}},[o("b-navbar",{attrs:{toggleable:"md",type:"dark",variant:"info"}},[o("b-navbar-toggle",{attrs:{target:"nav_collapse"}}),o("b-navbar-brand",{attrs:{href:"#/MyCourses"}},[e._v("Home")]),o("b-collapse",{attrs:{"is-nav":"",id:"nav_collapse"}},[o("b-navbar-nav",{staticClass:"ml-auto"},[o("b-nav-item-dropdown",{attrs:{text:"Options",right:""}},[o("b-dropdown-item",{attrs:{href:"#/MyCourses"}},[e._v("My Courses")]),o("b-dropdown-item",{attrs:{href:"#/CreateCourse"}},[e._v("Create Course")]),o("b-dropdown-item",{attrs:{href:"#/ModifyCourse"}},[e._v("Modify Course")]),o("b-dropdown-item",{attrs:{href:"#/DeactivateCourse"}},[e._v("Deactivate Course")]),o("b-dropdown-item",{attrs:{href:"#/CloneCourse"}},[e._v("Clone Course")]),o("b-dropdown-item",{attrs:{href:"#/CourseStatus"}},[e._v("Course Status")]),o("b-dropdown-item",{attrs:{href:"#/MergeCourse"}},[e._v("Merge Course")])],1),o("b-nav-item-dropdown",{attrs:{right:""}},[o("template",{slot:"button-content"},[o("em",[e._v("User")])]),o("b-dropdown-item",{attrs:{href:"#"}},[e._v("Profile")]),o("b-dropdown-item",{attrs:{href:"#"}},[e._v("Signout")])],2)],1)],1)],1),o("router-view")],1)},r=[],s=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",[o("h1",[e._v("Create Course")]),o("v-text-field",{attrs:{label:"Author"},model:{value:e.author,callback:function(t){e.author=t},expression:"author"}}),o("v-text-field",{attrs:{label:"Teaching Level"},model:{value:e.teachingLevel,callback:function(t){e.teachingLevel=t},expression:"teachingLevel"}}),o("v-text-field",{attrs:{label:"Description"},model:{value:e.description,callback:function(t){e.description=t},expression:"description"}}),o("h1",[e._v("Add Modules")]),o("div",{staticClass:"text-xs-center"},[o("v-btn",{on:{click:e.addText}},[e._v("Text")]),o("v-btn",{on:{click:e.addVideo}},[e._v("Video")]),o("v-btn",{on:{click:e.addAudio}},[e._v("Audio")]),o("v-btn",{on:{click:e.addPresentation}},[e._v("Presentation")]),o("v-btn",{on:{click:e.addQuiz}},[e._v("Quiz")]),e._l(e.modules,function(t,n){return o("div",[o("span",{staticClass:"module"},[e._v(e._s(t))]),o("v-btn",{on:{click:function(t){e.removeModule(n)}}},[e._v(" Remove")])],1)}),o("p",[o("v-btn",{attrs:{to:{name:"MyCourses"}},on:{click:e.submit}},[e._v("Submit")]),o("v-btn",{on:{click:e.clearStorage}},[e._v("Clear all")])],1)],2)],1)},u=[],l={data:function(){return{modules:[],author:"",teachingLevel:"",description:"",text:"TEXT",video:"VIDEO",audio:"AUDIO",presetation:"PRESENTATION",quiz:"QUIZ",newModule:null}},methods:{addText:function(){this.modules.length>=5?alert("Max 5 modules allowed!"):this.$router.push({name:"TextModule"})},addVideo:function(){this.modules.length>=5?alert("Max 5 modules allowed!"):this.$router.push({name:"VideoModule"})},addAudio:function(){this.modules.length>=5?alert("Max 5 modules allowed!"):this.$router.push({name:"AudioModule"})},addPresentation:function(){this.modules.length>=5?alert("Max 5 modules allowed!"):this.$router.push({name:"PresModule"})},addQuiz:function(){this.modules.length>=5?alert("Max 5 modules allowed!"):(this.modules.push(this.quiz),this.newModule="",this.saveModules())},removeModule:function(e){this.modules.splice(e,1),this.saveModules()},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},submit:function(){localStorage.author=this.author,localStorage.description=this.description,localStorage.teachingLevel=this.teachingLevel},clearStorage:function(){localStorage.modules=[],localStorage.author="",localStorage.description="",localStorage.teachingLevel=""}},mounted:function(){this.$nextTick(function(){if(localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}},a=l,d=(o("1d82"),o("2877")),c=Object(d["a"])(a,s,u,!1,null,"2e1cbfec",null);c.options.__file="CreateCourse.vue";var m=c.exports,h={name:"app",components:{Modules:m}},f=h,p=(o("034f"),Object(d["a"])(f,i,r,!1,null,null,null));p.options.__file="App.vue";var v=p.exports,b=o("7bb1"),_=(o("92d3"),o("8c4f")),g=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("v-layout",{attrs:{row:""}},[o("v-flex",{attrs:{xs12:"",sm6:"","offset-sm3":""}},[o("v-card",{staticClass:"mt-2"},[o("v-img",{attrs:{src:"https://cdn.vuetifyjs.com/images/cards/sunshine.jpg",height:"200px"}}),o("v-card-title",{attrs:{"primary-title":""}},[o("div",[o("div",{staticClass:"headline"},[e._v(e._s(e.author)+" "+e._s(e.teachingLevel))]),o("span",{staticClass:"grey--text"},[e._v(e._s(e.description))])])]),o("v-card-actions",[o("v-btn",{attrs:{flat:"",color:"red"}},[e._v("Share")]),o("v-btn",{attrs:{flat:"",color:"blue"}},[e._v("Explore")]),o("v-spacer"),o("v-btn",{attrs:{flat:"",color:"green"},on:{click:function(t){e.show=!e.show}}},[e._v("Modules\n        ")])],1),o("v-slide-y-transition",[o("v-card-text",{directives:[{name:"show",rawName:"v-show",value:e.show,expression:"show"}]},e._l(e.modules,function(t){return o("div",[o("p",[o("span",{staticClass:"module"},[e._v(e._s(t))])])])}))],1)],1)],1)],1)},y=[],M={data:function(){return{modules:[],user:[],author:"",teachingLevel:"",description:"",text:"TEXT",video:"VIDEO",audio:"AUDIO",presetation:"PRESENTATION",quiz:"QUIZ",newModule:null,show:!1}},mounted:function(){if(localStorage.author&&(this.author=localStorage.author),localStorage.teachingLevel&&(this.teachingLevel=localStorage.teachingLevel),localStorage.description&&(this.description=localStorage.description),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}}},T=M,C=Object(d["a"])(T,g,y,!1,null,null,null);C.options.__file="MyCourses.vue";var w=C.exports,x=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},$=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"removecourse"},[o("h1",[e._v("Remove Course")])])}],S={},I=Object(d["a"])(S,x,$,!1,null,null,null);I.options.__file="RemoveCourse.vue";var D=I.exports,O=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},E=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"modifycourse"},[o("h1",[e._v("Modify Course")])])}],k={},N=Object(d["a"])(k,O,E,!1,null,null,null);N.options.__file="ModifyCourse.vue";var P=N.exports,j=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},L=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"deactivatecourse"},[o("h1",[e._v("Deactivate Course")])])}],q={},V=Object(d["a"])(q,j,L,!1,null,null,null);V.options.__file="DeactivateCourse.vue";var A=V.exports,F=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},J=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"clonecourse"},[o("h1",[e._v("Clone Course")])])}],U={},R=Object(d["a"])(U,F,J,!1,null,null,null);R.options.__file="CloneCourse.vue";var z=R.exports,Q=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},H=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"CourseStatus"},[o("h1",[e._v("Course Status")])])}],X={},Z=Object(d["a"])(X,Q,H,!1,null,null,null);Z.options.__file="CourseStatus.vue";var Y=Z.exports,B=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Text Module Creation")]),o("form",{attrs:{id:"textStuff"},on:{submit:function(t){return t.preventDefault(),e.addText(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{attrs:{id:"editor1",type:"hidden",name:"content"}}),o("VueTrix",{attrs:{inputId:"editor1"},model:{value:e.editorContent,callback:function(t){e.editorContent=t},expression:"editorContent"}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})],1),o("TextModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,editorContent:e.editorContent,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},G=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"editor1"}},[o("strong",[e._v("Enter free form text to fill the module:")])])}],K=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"textM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("div",{domProps:{innerHTML:e._s(e.editorContent)}})]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},W=[],ee=(o("c5f6"),{props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,editorContent:String},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("textM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("textM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}}),te=ee,oe=Object(d["a"])(te,K,W,!1,null,null,null);oe.options.__file="TextModal.vue";var ne=oe.exports,ie={components:{TextModal:ne},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",editorContent:null,submitted:!1}},methods:{addText:function(){this.courseID=5,this.moduleID=9,this.contentType="text",this.submitted=!0,this.$refs.modal.show()},showDemo:function(){this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()}},mounted:function(){this.$nextTick(function(){this.$modal.show("textM")})}},re=ie,se=Object(d["a"])(re,B,G,!1,null,null,null);se.options.__file="TextModule.vue";var ue=se.exports,le=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},ae=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"mergecourse"},[o("h1",[e._v("Merge Course")])])}],de={},ce=Object(d["a"])(de,le,ae,!1,null,null,null);ce.options.__file="MergeCourse.vue";var me=ce.exports,he=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Audio Module Creation")]),o("form",{attrs:{id:"audioStuff"},on:{submit:function(t){return t.preventDefault(),e.addAudio(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{ref:"file",attrs:{type:"file",id:"f"},on:{change:function(t){e.handleFileUpload()}}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("AudioModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,audioFile:e.audioFile,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},fe=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"f"}},[o("strong",[e._v("Upload an audio file:")])])}],pe=o("bc3a"),ve=o.n(pe),be=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"audioM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("audio",{attrs:{controls:""}},[o("source",{attrs:{src:e.audioFile,type:"audio/mpeg"}})])]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},_e=[],ge={props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,audioFile:File},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("audioM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("audioM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}},ye=ge,Me=Object(d["a"])(ye,be,_e,!1,null,null,null);Me.options.__file="AudioModal.vue";var Te=Me.exports,Ce={components:{AudioModal:Te},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",audioFile:null,submitted:!1}},methods:{addAudio:function(){this.courseID=5,this.moduleID=9,this.contentType="audio",this.submitted=!0,this.$refs.modal.show()},handleFileUpload:function(){this.audioFile=this.$refs.file.files[0]},addVideo:function(){this.sendToMiddleMan(),this.getFromMiddleMan()},sendToMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.moduleTitle,contentType:this.contentType,content:this.audioFile}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})},showDemo:function(){this.moduleTitle=this.$route.query.moduleTitle,this.moduleID=this.$route.query.moduleID,this.courseID=this.$route.query.courseID,this.contentType=this.$route.query.contentType,this.module.editorContent=this.$route.query.editorContent,this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()}},mounted:function(){this.$route.query.moduleTitle&&this.$route.query.moduleID&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.showDemo()}},we=Ce,xe=Object(d["a"])(we,he,fe,!1,null,null,null);xe.options.__file="AudioModule.vue";var $e=xe.exports,Se=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Presentation Module Creation")]),o("form",{attrs:{id:"presentationStuff"},on:{submit:function(t){return t.preventDefault(),e.addPres(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{directives:[{name:"model",rawName:"v-model",value:e.embedLink,expression:"embedLink"}],ref:"pres",attrs:{type:"text",id:"pres"},domProps:{value:e.embedLink},on:{input:function(t){t.target.composing||(e.embedLink=t.target.value)}}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("PresModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,embedLink:e.embedLink,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},Ie=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"pres"}},[o("strong",[e._v("Provide an embed link to your presentation:")])])}],De=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"presM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("iframe",{attrs:{width:"550",height:"400",src:e.embedLink,webkitallowfullscreen:"1",mozallowfullscreen:"1",allowfullscreen:"1"}})]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},Oe=[],Ee={props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,embedLink:String},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("presM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("presM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}},ke=Ee,Ne=Object(d["a"])(ke,De,Oe,!1,null,null,null);Ne.options.__file="PresModal.vue";var Pe=Ne.exports,je={components:{PresModal:Pe},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",embedLink:"",submitted:!1}},methods:{addPres:function(){this.courseID=5,this.moduleID=9,this.contentType="presentation",this.submitted=!0,this.$refs.modal.show()},addVideo:function(){this.sendToMiddleMan(),this.getFromMiddleMan()},sendToMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.moduleTitle,contentType:this.contentType,content:this.embedLink}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})},showDemo:function(){this.moduleTitle=this.$route.query.moduleTitle,this.moduleID=this.$route.query.moduleID,this.courseID=this.$route.query.courseID,this.contentType=this.$route.query.contentType,this.module.editorContent=this.$route.query.editorContent,this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()}},mounted:function(){this.$route.query.moduleTitle&&this.$route.query.moduleID&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.showDemo()}},Le=je,qe=Object(d["a"])(Le,Se,Ie,!1,null,null,null);qe.options.__file="PresModule.vue";var Ve=qe.exports,Ae=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Video Module Creation")]),o("p",[e._v("You can add a title and the url for your video")]),o("form",{attrs:{id:"videoStuff"},on:{submit:function(t){return t.preventDefault(),e.addVideo(t)}}},[o("label",{attrs:{for:"title"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.title,expression:"title"}],attrs:{type:"text",id:"title",placeholder:"Title"},domProps:{value:e.title},on:{input:function(t){t.target.composing||(e.title=t.target.value)}}}),o("br"),o("label",{attrs:{for:"title"}},[e._v("Enter URL for your video: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.url,expression:"url"}],attrs:{type:"text",id:"url",placeholder:"url"},domProps:{value:e.url},on:{input:function(t){t.target.composing||(e.url=t.target.value)}}}),o("br"),o("span",[e._v("Example: https://staging.coverr.co/s3/mp4/Snow-motion.mp4")]),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("modal",{attrs:{name:"test",width:640,height:360}},[o("video",{attrs:{controls:"",src:e.name,width:"640"}})])],1)},Fe=[],Je={name:"VideoModule",mounted:function(){this.getFromMiddleMan()},prop:{},data:function(){return{name:"",info:"",title:"",url:"",modules:[],contentType:"video",content:"",showModal:!0,videos:"",newVideoTitle:"",newVideoUrl:"",deleted:!1}},methods:{addVideo:function(){this.modules.push(this.title),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},showVideo:function(e){alert(e)},show:function(e){this.$modal.show("test"),this.name=e},hide:function(){this.$modal.hide("test")},sendToMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.newVideoTitle,contentType:this.contentType,content:this.newVideoUrl}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;ve.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})}}},Ue=Je,Re=(o("fac0"),Object(d["a"])(Ue,Ae,Fe,!1,null,"6c3f13a9",null));Re.options.__file="VideoModule.vue";var ze=Re.exports;n["default"].use(_["a"]);var Qe=new _["a"]({routes:[{path:"/MyCourses",name:"MyCourses",component:w},{path:"/RemoveCourse",name:"RemoveCourse",component:D},{path:"/ModifyCourse",name:"ModifyCourse",component:P},{path:"/DeactivateCourse",name:"DeactivateCourse",component:A},{path:"/CreateCourse/",name:"CreateCourse",component:m},{path:"/CourseStatus",name:"CourseStatus",component:Y},{path:"/CloneCourse",name:"CloneCourse",component:z},{path:"/TextModule",name:"TextModule",component:ue},{path:"/VideoModule",name:"VideoModule",component:ze},{path:"/MergeCourse",name:"MergeCourse",component:me},{path:"/PresModule",name:"PresModule",component:Ve},{path:"/AudioModule",name:"AudioModule",component:$e}]}),He=o("1881"),Xe=o.n(He),Ze=o("9f7b"),Ye=(o("f9e3"),o("2dd8"),o("ce5b")),Be=o.n(Ye);o("bf40");n["default"].use(Be.a),n["default"].use(Xe.a),n["default"].use(Ze["a"]),n["default"].use(b["a"]),n["default"].config.productionTip=!1,new n["default"]({router:Qe,render:function(e){return e(v)},data:{showModal:!1}}).$mount("#app")},c21b:function(e,t,o){},ca13:function(e,t,o){},fac0:function(e,t,o){"use strict";var n=o("ca13"),i=o.n(n);i.a}});
//# sourceMappingURL=app.49456e73.js.map