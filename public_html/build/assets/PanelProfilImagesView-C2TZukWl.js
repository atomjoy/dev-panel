import{e as d,r as m,o as f,c as h,b as e,a as r,t as l,j as g,M as v,z as $,A as b,H as w,s as I,h as S,w as P,k as B,u as U}from"./app-DryvI0XL.js";import{_ as k}from"./ClientMenu-CEBEqxD9.js";import{E as y,B as C}from"./PageLink-C_pdXp6r.js";import{L}from"./Label-CXuB6-FL.js";import{_ as R,a as V}from"./LinksPage-44TccAKD.js";import"./ChangeTitle-Bb1Rvk3E.js";const _=""+new URL("banner-BvcDJtqv.png",import.meta.url).href,u=i=>($("data-v-f7cfede0"),i=i(),b(),i),j={class:"input-group"},x={class:"profile-input"},D=["title"],E=u(()=>e("i",{class:"fa-solid fa-trash"},null,-1)),M=[E],N=["src"],q={class:"choose-info"},A={id:"upload-button"},F=u(()=>e("i",{class:"fa-solid fa-upload"},null,-1)),T={__name:"ProfilInput",props:{profile:{default:_},label:{default:"Select image"},remove_profile_url:{default:"/web/api/remove/banner"},remove_success:{default:"Profil banner removed."},remove_error:{default:"Profil banner not removed."}},setup(i){const o=i,a=m(null);o.profile?(a.value="/storage/"+o.profile,console.log(a.value,o.profile),o.profile.toLowerCase().startsWith("http://")&&(a.value=o.profile),o.profile.toLowerCase().startsWith("https://")&&(a.value=o.profile)):a.value=_;function n(s){const p=URL.createObjectURL(s.target.files[0]);p&&(a.value=p)}async function c(){try{await v.post(o.remove_profile_url,[]),a.value=_,alert(o.remove_success)}catch{alert(o.remove_error)}}function t(){document.querySelector("#profile-input").click()}return(s,p)=>(f(),h("div",j,[e("div",x,[e("div",{onClick:c,class:"delete-profile",title:s.$t("Remove profile image")},M,8,D),e("img",{src:a.value,class:"profile-image"},null,8,N),r(L,{name:"profile",text:"Select image"}),e("div",{id:"choose-file",onClick:t},[e("span",q,l(s.$t("Select image with .webp, .png or .jpg extension (min. 1920x540 px).")),1),e("span",A,[F,g(" "+l(s.$t("Choose Image")),1)])]),e("input",{id:"profile-input",onChange:n,type:"file",name:"banner",hidden:"true"},null,32)])]))}},W=d(T,[["__scopeId","data-v-f7cfede0"]]),z={class:"page"},H={class:"page__menu"},J={class:"page-menu__nav"},O={class:"page__wrapper"},G={class:"page__menu-left"},K={class:"page-menu__title"},Q={class:"page__content"},X={class:"page-content__title"},Y=e("i",{class:"fa-regular fa-image"},null,-1),Z={class:"submenu__title"},ee={class:"page-content__desc"},te={class:"h4-title"},ne={__name:"PanelProfilImagesView",setup(i){const o=w(),a=o.getUser;let n=I({get(){var t,s;return((s=(t=a.value)==null?void 0:t.profile)==null?void 0:s.banner)??""},set(t){avatar.value=t}});function c(t){o.changeUserBanner(new FormData(t.target)),o.scrollTop()}return(t,s)=>(f(),S(k,null,{default:P(()=>[e("div",z,[e("div",H,[e("span",null,l(t.$t("Profil")),1),e("div",J,[r(R)])]),e("div",O,[e("div",G,[e("div",K,l(t.$t("Profil")),1),r(V)]),e("div",Q,[e("div",X,[Y,e("span",Z,l(t.$t("Image settings")),1)]),e("p",ee,l(t.$t("Upload your banner image here.")),1),r(y),e("h4",te,l(t.$t("Upload profil banner")),1),e("form",{onSubmit:B(c,["prevent"]),method:"post",enctype:"multipart/form-data",class:"label-color client-panel-form"},[r(W,{label:t.$t("Select image"),profile:U(n)},null,8,["label","profile"]),r(C,{text:t.$t("Update")},null,8,["text"])],32)])])])]),_:1}))}};export{ne as default};
