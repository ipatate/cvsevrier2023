!function(e){var t={};function n(r){if(t[r])return t[r].exports;var a=t[r]={i:r,l:!1,exports:{}};return e[r].call(a.exports,a,a.exports,n),a.l=!0,a.exports}n.m=e,n.c=t,n.d=function(e,t,r){n.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:r})},n.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},n.t=function(e,t){if(1&t&&(e=n(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var r=Object.create(null);if(n.r(r),Object.defineProperty(r,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)n.d(r,a,function(t){return e[t]}.bind(null,a));return r},n.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return n.d(t,"a",t),t},n.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},n.p="",n(n.s=2)}([function(e,t){!function(){e.exports=this.wp.element}()},,function(e,t,n){"use strict";n.r(t);var r=n(0),a=wp.components,c=a.PanelBody,l=a.ToggleControl,o=(a.TextControl,wp.blockEditor.InspectorControls),i=wp.i18n.__,u=function(e){var t=e.props,n=t.attributes,a=t.setAttributes,u=n.pictureInverted;return Object(r.createElement)(o,null,Object(r.createElement)(c,{title:i("Settings","gm-bloc")},Object(r.createElement)(l,{label:i("Inverted picture","gm-bloc"),checked:u,onChange:function(){return a({pictureInverted:!u})}})))},m=wp.components,s=m.Button,b=m.Dashicon,p=m.Spinner,g=wp.element.useEffect,d=wp.blockEditor,f=d.MediaUpload,v=d.MediaUploadCheck,j=wp.data.useSelect,O=wp.i18n.__,E=["image"],k=function(e){var t=e.media_details,n=e.source_url,r=n;if(t){var a=t.sizes.gm_mobile_size;r=a?a.source_url:n}return r},y=function(e){var t=e.props,n=(e.index,t.attributes),a=t.setAttributes,c=n.imageId,l=j((function(e){var t=e("core").getMedia;return c?t(c):{}}),[c]);g((function(){l&&a({image:l,imageUrl:k(l)})}),[l]);var o=function(){confirm("Are you sure to remove this image ?")&&a({imageId:void 0,image:void 0,imageUrl:void 0})};return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(v,null,Object(r.createElement)(f,{title:O("Image",""),onSelect:function(e){a({imageId:e.id,image:e,imageUrl:k(e)})},allowedTypes:E,value:l,render:function(e){var t=e.open;return c&&l?Object(r.createElement)("div",{className:"gm-block-page-image",style:{backgroundImage:"url('".concat(l.source_url,"')")}},Object(r.createElement)("a",{onClick:function(e){return e.preventDefault}},Object(r.createElement)(s,{onClick:o,title:O("remove","gm-bloc")},Object(r.createElement)(b,{icon:"dismiss"})))):Object(r.createElement)("div",{className:"gm-block-page-image gm-block-page-image-empty"},Object(r.createElement)(s,{onClick:t,title:O("add image","gm-bloc")},!c&&Object(r.createElement)(b,{icon:"plus-alt"}),!!c&&!l&&Object(r.createElement)(p,null)))}})))},x=wp.blockEditor,h=x.RichText,w=x.URLInputButton,N=wp.i18n.__,_=function(e){var t=e.attributes,n=e.setAttributes,a=e.className,c=t.title,l=t.text,o=t.textBtn,i=t.pictureInverted,m=t.urlBtn;return Object(r.createElement)(r.Fragment,null,Object(r.createElement)(u,{props:e}),Object(r.createElement)("div",{className:"gm-block-page-container ".concat(i?"gm-block-page-inverted":""," ").concat(a)},Object(r.createElement)(y,{props:e}),Object(r.createElement)("div",{className:"gm-block-page-content"},Object(r.createElement)("h2",{className:"gm-block-page-title"},Object(r.createElement)("a",{onClick:function(e){return e.preventDefault}},Object(r.createElement)(h,{allowedFormats:[],placeholder:N("Add title","gm-bloc"),value:c,onChange:function(e){return n({title:e})}}))),Object(r.createElement)("p",{className:"gm-block-page-text"},Object(r.createElement)(h,{allowedFormats:[],placeholder:N("Add text","gm-bloc"),value:l,onChange:function(e){return n({text:e})}})),Object(r.createElement)("div",{className:"gm-block-page-btn"},Object(r.createElement)("a",{onClick:function(e){return e.preventDefault},className:"btn-arrow btn-icon-after"},Object(r.createElement)(h,{tagName:"span",allowedFormats:[],placeholder:N("Add text","gm-bloc"),value:o,onChange:function(e){return n({textBtn:e})}})),Object(r.createElement)(w,{url:m,onChange:function(e,t){return n({urlBtn:e,titleBtn:t&&t.title||o})}})))))},C=function(e){var t=e.props,n=(e.index,t.attributes),a=n.title,c=n.urlBtn,l=n.imageUrl;return Object(r.createElement)("div",{className:"gm-block-page-image",style:{backgroundImage:"url('".concat(l,"')")}},Object(r.createElement)("a",{href:c,title:a}))},B=wp.blockEditor.RichText,I=function(e){var t=e.attributes,n=t.title,a=t.text,c=t.textBtn,l=(t.image,t.pictureInverted),o=t.urlBtn;t.titleBtn;return Object(r.createElement)("div",{className:"gm-block-page-container ".concat(l?"gm-block-page-inverted":"")},Object(r.createElement)(C,{props:e}),Object(r.createElement)("div",{className:"gm-block-page-content"},Object(r.createElement)("h2",{className:"gm-block-page-title"},Object(r.createElement)(B.Content,{tagName:"a",href:o,title:n,value:n})),Object(r.createElement)(B.Content,{tagName:"p",className:"gm-block-page-text",value:a}),Object(r.createElement)("div",{className:"gm-block-page-btn"},Object(r.createElement)("a",{href:o,title:n,className:"btn-arrow btn-icon-after"},Object(r.createElement)(B.Content,{tagName:"span",value:c})))))},S=wp.blocks.registerBlockType;wp.i18n.__;S("gm/page",{title:"Block page",description:"Page block for show 1 pictures and one block with text, title and link",icon:"star-filled",category:"theme-blocks",attributes:{pictureInverted:{type:"boolean",default:!1},title:{type:"string",default:"Mon super titre..."},text:{type:"string",default:"Quibus occurrere bene pertinax miles explicatis ordinibus parans hastisque feriens scuta qui habitus iram pugnantium concitat et dolorem proximos iam gestu terrebat sed eum in certamen"},textBtn:{type:"string",default:"En savoir plus"},urlBtn:{type:"string"},image:{type:"string"},imageId:{type:"number"},imageUrl:{type:"string"}},edit:_,save:I})}]);