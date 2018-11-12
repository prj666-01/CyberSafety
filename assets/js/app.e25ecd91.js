(function(e){function t(t){for(var r,s,u=t[0],a=t[1],l=t[2],c=0,m=[];c<u.length;c++)s=u[c],n[s]&&m.push(n[s][0]),n[s]=0;for(r in a)Object.prototype.hasOwnProperty.call(a,r)&&(e[r]=a[r]);d&&d(t);while(m.length)m.shift()();return i.push.apply(i,l||[]),o()}function o(){for(var e,t=0;t<i.length;t++){for(var o=i[t],r=!0,u=1;u<o.length;u++){var a=o[u];0!==n[a]&&(r=!1)}r&&(i.splice(t--,1),e=s(s.s=o[0]))}return e}var r={},n={app:0},i=[];function s(t){if(r[t])return r[t].exports;var o=r[t]={i:t,l:!1,exports:{}};return e[t].call(o.exports,o,o.exports,s),o.l=!0,o.exports}s.m=e,s.c=r,s.d=function(e,t,o){s.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:o})},s.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},s.t=function(e,t){if(1&t&&(e=s(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var o=Object.create(null);if(s.r(o),Object.defineProperty(o,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var r in e)s.d(o,r,function(t){return e[t]}.bind(null,r));return o},s.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return s.d(t,"a",t),t},s.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},s.p="/";var u=window["webpackJsonp"]=window["webpackJsonp"]||[],a=u.push.bind(u);u.push=t,u=u.slice();for(var l=0;l<u.length;l++)t(u[l]);var d=a;i.push([0,"chunk-vendors"]),o()})({0:function(e,t,o){e.exports=o("56d7")},"034f":function(e,t,o){"use strict";var r=o("c21b"),n=o.n(r);n.a},"56d7":function(e,t,o){"use strict";o.r(t);o("cadf"),o("551c"),o("097d");var r=o("2b0e"),n=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{attrs:{id:"app"}},[o("b-navbar",{attrs:{toggleable:"md",type:"dark",variant:"primary"}},[o("b-navbar-toggle",{attrs:{target:"nav_collapse"}}),o("b-navbar-brand",{attrs:{href:"#/MyCourses"}},[e._v("Home")]),o("b-collapse",{attrs:{"is-nav":"",id:"nav_collapse"}},[o("b-navbar-nav",{staticClass:"ml-auto"},[o("b-nav-item-dropdown",{attrs:{text:"Options",right:""}},[o("b-dropdown-item",{attrs:{href:"#/MyCourses"}},[e._v("My Courses")]),o("b-dropdown-item",{attrs:{href:"#/CreateCourse"}},[e._v("Create Course")]),o("b-dropdown-item",{attrs:{href:"#/ModifyCourse"}},[e._v("Modify Course")]),o("b-dropdown-item",{attrs:{href:"#/DeactivateCourse"}},[e._v("Deactivate Course")]),o("b-dropdown-item",{attrs:{href:"#/CloneCourse"}},[e._v("Clone Course")]),o("b-dropdown-item",{attrs:{href:"#/CourseStatus"}},[e._v("Course Status")]),o("b-dropdown-item",{attrs:{href:"#/MergeCourse"}},[e._v("Merge Course")])],1),o("b-nav-item-dropdown",{attrs:{right:""}},[o("template",{slot:"button-content"},[o("em",[e._v("User")])]),o("b-dropdown-item",{attrs:{href:"#"}},[e._v("Profile")]),o("b-dropdown-item",{attrs:{href:"#"}},[e._v("Signout")])],2)],1)],1)],1),o("router-view")],1)},i=[],s=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",[o("h1",[e._v("Add course information")]),e.show?o("b-form",{on:{submit:e.onSubmit,reset:e.onReset}},[o("b-form-group",{attrs:{id:"title",label:"Course Title:","label-for":"title"}},[o("b-form-input",{attrs:{id:"titleId",type:"text",required:"",placeholder:"Enter Title"},model:{value:e.form.courseTitle,callback:function(t){e.$set(e.form,"courseTitle",t)},expression:"form.courseTitle"}})],1),o("b-form-group",{attrs:{id:"author",label:"Author Name:","label-for":"author"}},[o("b-form-input",{attrs:{id:"authorId",type:"text",required:"",placeholder:"Enter name"},model:{value:e.form.courseAuthor,callback:function(t){e.$set(e.form,"courseAuthor",t)},expression:"form.courseAuthor"}})],1),o("b-form-group",{attrs:{id:"description",label:"Course Description:","label-for":"description"}},[o("b-form-input",{attrs:{id:"descriptionId",type:"text",required:"",placeholder:"Enter name"},model:{value:e.form.courseDescription,callback:function(t){e.$set(e.form,"courseDescription",t)},expression:"form.courseDescription"}})],1),o("b-form-group",{attrs:{id:"teachingingLevel",label:"Teaching Level:","label-for":"teachingLevel"}},[o("b-form-select",{attrs:{id:"teachinLevelId",options:e.teachingLevel,required:""},model:{value:e.form.courseTeachingLevel,callback:function(t){e.$set(e.form,"courseTeachingLevel",t)},expression:"form.courseTeachingLevel"}})],1),o("h1",[e._v("Add modules")]),o("div",{staticClass:"text-center"},[o("b-button",{staticClass:"mr-2",attrs:{variant:"primary"},on:{click:e.addTextModule}},[e._v("Text")]),o("b-button",{staticClass:"mr-2",attrs:{variant:"primary"}},[e._v("Video")]),o("b-button",{staticClass:"mr-2",attrs:{variant:"primary"}},[e._v("Quiz")]),o("b-button",{staticClass:"mr-2",attrs:{variant:"primary"}},[e._v("Audio")]),o("b-button",{staticClass:"mr-2",attrs:{variant:"primary"}},[e._v("Presentation")])],1),o("br"),o("br"),o("br"),o("h1",[e._v("Submit course")]),o("div",{staticClass:"mt-2 text-center"},[o("b-button",{staticClass:"mr-2",attrs:{type:"submit",variant:"success"},on:{click:e.addCourse}},[e._v("Submit")]),o("b-button",{attrs:{type:"reset",variant:"danger"}},[e._v("Reset")])],1)],1):e._e()],1)},u=[],a=o("bc3a"),l=o.n(a),d={data:function(){return{form:{courseTitle:"",courseAuthor:"",courseDescription:"",courseModules:[],courseTeachingLevel:null},teachingLevel:[{text:"Select One",value:null},"Grade 1","Grade 2","Grade 3","Grade 4"],show:!0}},mounted:function(){this.getFromMiddleMan()},methods:{addTextModule:function(){},onSubmit:function(e){e.preventDefault(),l.a.post("http://myvmlab.senecacollege.ca:6255/api/create/course",JSON.stringify(this.form)).then(function(e){alert(e.data)}),this.$router.push({name:"MyCourses"})},onReset:function(e){var t=this;e.preventDefault(),this.form.courseTitle="",this.form.courseAuthor="",this.form.courseDescription="",this.form.courseTeachingLevel=null,this.show=!1,this.$nextTick(function(){t.show=!0})},sendToMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{Course_Title:this.courseTitle,Course_Author:this.courseAuthor,Course_Description:this.courseDescription,Teaching_Level:this.courseTeachingLevel,Course_Modules:this.courseModules}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})}}},c=d,m=o("2877"),h=Object(m["a"])(c,s,u,!1,null,null,null);h.options.__file="CreateCourse.vue";var f=h.exports,p={name:"app",components:{Modules:f}},v=p,b=(o("034f"),Object(m["a"])(v,n,i,!1,null,null,null));b.options.__file="App.vue";var _=b.exports,g=o("7bb1"),T=(o("92d3"),o("8c4f")),y=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("v-layout",{attrs:{column:""}},e._l(e.corinfo,function(t){return o("div",[o("v-layout",{attrs:{row:""}},[o("v-flex",{attrs:{xs12:"",sm6:"","offset-sm3":""}},[o("v-card",{staticClass:"mt-2"},[o("v-card-title",{attrs:{"primary-title":""}},[o("div",[o("h1",[e._v(e._s(t.Course_Title))]),o("div",{staticClass:"headline"},[e._v(e._s(e.usrinfo.First_Name)+" "+e._s(e.usrinfo.Last_Name)+" "+e._s(e.usrinfo.Teaching_Level))]),o("span",{staticClass:"grey--text"},[e._v(e._s(t.Course_Description))])])]),o("v-card-actions",[o("v-btn",{attrs:{flat:"",color:"red"}},[e._v("Share")]),o("v-spacer"),o("v-btn",{attrs:{flat:"",color:"green"},on:{click:function(t){e.show=!e.show}}},[e._v("Modules\n            ")])],1),o("v-slide-y-transition",[o("v-card-text",{directives:[{name:"show",rawName:"v-show",value:e.show,expression:"show"}]},e._l(e.modinfo,function(t){return o("div",[o("p",[o("span",{staticClass:"module"},[e._v(e._s(t.Module_Title))])])])}))],1)],1)],1)],1)],1)}))},M=[],C={data:function(){return{courses:["1","2","3","4","5"],modules:["1","2","3","4","5","6"],user:[],author:"Colin McManus",usrinfo:"",corinfo:"",modinfo:"",teachingLevel:"12",description:"This is a test module",text:"TEXT",video:"VIDEO",audio:"AUDIO",presetation:"PRESENTATION",quiz:"QUIZ",newModule:null,show:!1}},methods:{getFromMiddleMan:function(){var e=this;l.a.get("https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/user",{}).then(function(t){e.usrinfo=t.data}),l.a.get("https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/course/{:(usrinfo.User_Id)}",{}).then(function(t){e.corinfo=t.data}),l.a.get("https://myvmlab.senecacollege.ca:6255/home/student/website/api/get/module/{:(corinfo.Course_Id)}",{}).then(function(t){e.modinfo=t.data})}},mounted:function(){console.log(this.test),this.getFromMiddleMan()}},w=C,$=Object(m["a"])(w,y,M,!1,null,null,null);$.options.__file="MyCourses.vue";var x=$.exports,D=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},I=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"removecourse"},[o("h1",[e._v("Remove Course")])])}],S={},E=Object(m["a"])(S,D,I,!1,null,null,null);E.options.__file="RemoveCourse.vue";var O=E.exports,k=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},N=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"modifycourse"},[o("h1",[e._v("Modify Course")])])}],L={},P=Object(m["a"])(L,k,N,!1,null,null,null);P.options.__file="ModifyCourse.vue";var q=P.exports,j=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},F=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"deactivatecourse"},[o("h1",[e._v("Deactivate Course")])])}],A={},V=Object(m["a"])(A,j,F,!1,null,null,null);V.options.__file="DeactivateCourse.vue";var J=V.exports,U=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},R=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"clonecourse"},[o("h1",[e._v("Clone Course")])])}],z={},G=Object(m["a"])(z,U,R,!1,null,null,null);G.options.__file="CloneCourse.vue";var Q=G.exports,H=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},X=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"CourseStatus"},[o("h1",[e._v("Course Status")])])}],Y={},Z=Object(m["a"])(Y,H,X,!1,null,null,null);Z.options.__file="CourseStatus.vue";var B=Z.exports,K=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Text Module Creation")]),o("form",{attrs:{id:"textStuff"},on:{submit:function(t){return t.preventDefault(),e.addText(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{attrs:{id:"editor1",type:"hidden",name:"content"}}),o("VueTrix",{attrs:{inputId:"editor1"},model:{value:e.editorContent,callback:function(t){e.editorContent=t},expression:"editorContent"}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})],1),o("TextModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,editorContent:e.editorContent,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},W=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"editor1"}},[o("strong",[e._v("Enter free form text to fill the module:")])])}],ee=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"textM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("div",{domProps:{innerHTML:e._s(e.editorContent)}})]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},te=[],oe=(o("c5f6"),{props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,editorContent:String},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("textM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("textM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}}),re=oe,ne=Object(m["a"])(re,ee,te,!1,null,null,null);ne.options.__file="TextModal.vue";var ie=ne.exports,se={components:{TextModal:ie},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",editorContent:null,submitted:!1,info:""}},methods:{addText:function(){this.courseID=5,this.moduleID=9,this.contentType="text",this.submitted=!0,this.sendToMiddleMan(),this.$refs.modal.show()},showDemo:function(){this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()},sendToMiddleMan:function(){var e=this;l.a.post("https://myvmlab.senecacollege.ca:6255/home/student/website/api/create/module",{Module_Id:this.moduleID,Module_Title:this.moduleTitle,Course_Id:this.courseID,Content_Type:this.contentType,Content:this.editorContent,Quiz:!1}).then(function(t){e.info=t.data})}},mounted:function(){this.$nextTick(function(){this.$modal.show("textM")})}},ue=se,ae=Object(m["a"])(ue,K,W,!1,null,null,null);ae.options.__file="TextModule.vue";var le=ae.exports,de=function(){var e=this,t=e.$createElement;e._self._c;return e._m(0)},ce=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("div",{staticClass:"mergecourse"},[o("h1",[e._v("Merge Course")])])}],me={},he=Object(m["a"])(me,de,ce,!1,null,null,null);he.options.__file="MergeCourse.vue";var fe=he.exports,pe=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Audio Module Creation")]),o("form",{attrs:{id:"audioStuff"},on:{submit:function(t){return t.preventDefault(),e.addAudio(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{ref:"file",attrs:{type:"file",id:"f"},on:{change:function(t){e.handleFileUpload()}}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("AudioModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,audioFile:e.audioFile,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},ve=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"f"}},[o("strong",[e._v("Upload an audio file:")])])}],be=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"audioM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("audio",{attrs:{controls:""}},[o("source",{attrs:{src:e.audioFile,type:"audio/mpeg"}})])]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},_e=[],ge={props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,audioFile:File},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("audioM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("audioM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}},Te=ge,ye=Object(m["a"])(Te,be,_e,!1,null,null,null);ye.options.__file="AudioModal.vue";var Me=ye.exports,Ce={components:{AudioModal:Me},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",audioFile:null,submitted:!1}},methods:{addAudio:function(){this.courseID=5,this.moduleID=9,this.contentType="audio",this.submitted=!0,this.$refs.modal.show()},handleFileUpload:function(){this.audioFile=this.$refs.file.files[0]},addVideo:function(){this.sendToMiddleMan(),this.getFromMiddleMan()},sendToMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.moduleTitle,contentType:this.contentType,content:this.audioFile}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})},showDemo:function(){this.moduleTitle=this.$route.query.moduleTitle,this.moduleID=this.$route.query.moduleID,this.courseID=this.$route.query.courseID,this.contentType=this.$route.query.contentType,this.module.editorContent=this.$route.query.editorContent,this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()}},mounted:function(){this.$route.query.moduleTitle&&this.$route.query.moduleID&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.showDemo()}},we=Ce,$e=Object(m["a"])(we,pe,ve,!1,null,null,null);$e.options.__file="AudioModule.vue";var xe=$e.exports,De=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Presentation Module Creation")]),o("form",{attrs:{id:"presentationStuff"},on:{submit:function(t){return t.preventDefault(),e.addPres(t)}}},[o("label",{attrs:{for:"ttl"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.moduleTitle,expression:"moduleTitle"}],attrs:{type:"text",id:"ttl"},domProps:{value:e.moduleTitle},on:{input:function(t){t.target.composing||(e.moduleTitle=t.target.value)}}}),o("br"),o("br"),o("br"),e._m(0),o("br"),o("br"),o("input",{directives:[{name:"model",rawName:"v-model",value:e.embedLink,expression:"embedLink"}],ref:"pres",attrs:{type:"text",id:"pres"},domProps:{value:e.embedLink},on:{input:function(t){t.target.composing||(e.embedLink=t.target.value)}}}),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("PresModal",{ref:"modal",attrs:{moduleTitle:e.moduleTitle,embedLink:e.embedLink,courseID:e.courseID,moduleID:e.moduleID,contentType:e.contentType},on:{hidden:e.clear}})],1)},Ie=[function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("label",{attrs:{for:"pres"}},[o("strong",[e._v("Provide an embed link to your presentation:")])])}],Se=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("modal",{directives:[{name:"show",rawName:"v-show",value:e.submitted,expression:"submitted"}],attrs:{name:"presM",height:"auto",scrollable:!0,adaptive:!0}},[o("header",[o("h2",[e._v(e._s(e.moduleTitle))])]),o("body",[o("iframe",{attrs:{width:"550",height:"400",src:e.embedLink,webkitallowfullscreen:"1",mozallowfullscreen:"1",allowfullscreen:"1"}})]),o("footer",[o("v-btn",{on:{click:e.add}},[e._v("Finished")])],1)])},Ee=[],Oe={props:{courseID:Number,moduleID:Number,contentType:String,moduleTitle:String,embedLink:String},data:function(){return{modules:[],submitted:!1}},methods:{show:function(){this.submitted=!0},add:function(){this.modules.push(this.moduleTitle),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},hide:function(){this.$modal.hide("presM"),this.submitted=!1,this.$emit("hidden")}},mounted:function(){this.$nextTick(function(){if(this.$modal.show("presM"),localStorage.getItem("modules"))try{this.modules=JSON.parse(localStorage.getItem("modules"))}catch(e){localStorage.removeItem("modules")}})}},ke=Oe,Ne=Object(m["a"])(ke,Se,Ee,!1,null,null,null);Ne.options.__file="PresModal.vue";var Le=Ne.exports,Pe={components:{PresModal:Le},data:function(){return{moduleTitle:"",courseID:0,moduleID:0,contentType:"",embedLink:"",submitted:!1}},methods:{addPres:function(){this.courseID=5,this.moduleID=9,this.contentType="presentation",this.submitted=!0,this.$refs.modal.show()},addVideo:function(){this.sendToMiddleMan(),this.getFromMiddleMan()},sendToMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.moduleTitle,contentType:this.contentType,content:this.embedLink}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})},showDemo:function(){this.moduleTitle=this.$route.query.moduleTitle,this.moduleID=this.$route.query.moduleID,this.courseID=this.$route.query.courseID,this.contentType=this.$route.query.contentType,this.module.editorContent=this.$route.query.editorContent,this.submitted=!0,this.$refs.modal.show()},clear:function(){this.submitted=!1,this.$refs.modal.hide()}},mounted:function(){this.$route.query.moduleTitle&&this.$route.query.moduleID&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.$route.query.moduleTitle&&this.showDemo()}},qe=Pe,je=Object(m["a"])(qe,De,Ie,!1,null,null,null);je.options.__file="PresModule.vue";var Fe=je.exports,Ae=function(){var e=this,t=e.$createElement,o=e._self._c||t;return o("main",[o("h1",[e._v("Video Module Creation")]),o("p",[e._v("You can add a title and the url for your video")]),o("form",{attrs:{id:"videoStuff"},on:{submit:function(t){return t.preventDefault(),e.addVideo(t)}}},[o("label",{attrs:{for:"title"}},[e._v("Enter a title for your module: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.title,expression:"title"}],attrs:{type:"text",id:"title",placeholder:"Title"},domProps:{value:e.title},on:{input:function(t){t.target.composing||(e.title=t.target.value)}}}),o("br"),o("label",{attrs:{for:"title"}},[e._v("Enter URL for your video: ")]),o("input",{directives:[{name:"model",rawName:"v-model",value:e.url,expression:"url"}],attrs:{type:"text",id:"url",placeholder:"url"},domProps:{value:e.url},on:{input:function(t){t.target.composing||(e.url=t.target.value)}}}),o("br"),o("span",[e._v("Example: https://staging.coverr.co/s3/mp4/Snow-motion.mp4")]),o("br"),o("br"),o("input",{attrs:{type:"submit",value:"Submit"}})]),o("modal",{attrs:{name:"test",width:640,height:360}},[o("video",{attrs:{controls:"",src:e.name,width:"640"}})])],1)},Ve=[],Je={name:"VideoModule",mounted:function(){this.getFromMiddleMan()},prop:{},data:function(){return{name:"",info:"",title:"",url:"",modules:[],contentType:"video",content:"",showModal:!0,videos:"",newVideoTitle:"",newVideoUrl:"",deleted:!1}},methods:{addVideo:function(){this.modules.push(this.title),this.saveModules(),this.$router.push({name:"CreateCourse"})},saveModules:function(){var e=JSON.stringify(this.modules);localStorage.setItem("modules",e)},showVideo:function(e){alert(e)},show:function(e){this.$modal.show("test"),this.name=e},hide:function(){this.$modal.hide("test")},sendToMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{title:this.newVideoTitle,contentType:this.contentType,content:this.newVideoUrl}).then(function(t){e.info=t.data})},getFromMiddleMan:function(){var e=this;l.a.post("http://ruihui.me/create-course/middle-man.php",{}).then(function(t){e.info=t.data})}}},Ue=Je,Re=(o("fac0"),Object(m["a"])(Ue,Ae,Ve,!1,null,"6c3f13a9",null));Re.options.__file="VideoModule.vue";var ze=Re.exports;r["default"].use(T["a"]);var Ge=new T["a"]({routes:[{path:"/MyCourses",name:"MyCourses",component:x},{path:"/RemoveCourse",name:"RemoveCourse",component:O},{path:"/ModifyCourse",name:"ModifyCourse",component:q},{path:"/DeactivateCourse",name:"DeactivateCourse",component:J},{path:"/CreateCourse/",name:"CreateCourse",component:f},{path:"/CourseStatus",name:"CourseStatus",component:B},{path:"/CloneCourse",name:"CloneCourse",component:Q},{path:"/TextModule",name:"TextModule",component:le},{path:"/VideoModule",name:"VideoModule",component:ze},{path:"/MergeCourse",name:"MergeCourse",component:fe},{path:"/PresModule",name:"PresModule",component:Fe},{path:"/AudioModule",name:"AudioModule",component:xe}]}),Qe=o("1881"),He=o.n(Qe),Xe=o("9f7b");o("f9e3"),o("2dd8");r["default"].use(He.a),r["default"].use(Xe["a"]),r["default"].use(g["a"]),r["default"].config.productionTip=!1,new r["default"]({router:Ge,render:function(e){return e(_)},data:{showModal:!1}}).$mount("#app")},c21b:function(e,t,o){},ca13:function(e,t,o){},fac0:function(e,t,o){"use strict";var r=o("ca13"),n=o.n(r);n.a}});
//# sourceMappingURL=app.e25ecd91.js.map