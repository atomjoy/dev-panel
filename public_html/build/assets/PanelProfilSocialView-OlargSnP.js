import{H as I,r as f,O as N,o as u,h as D,w as P,b as a,t,a as r,k as q,u as v,p as b,c as k,i as S,l as A,n as F,j as M,F as j}from"./app-B3RTu2d5.js";import{_ as L,a as T,E as z,B as H,b as O}from"./LinksPage-DuWqRXz_.js";import{I as y}from"./Input-DWRW6dml.js";import{S as R}from"./Select-DI4kPnm-.js";import"./Label-D5lgV9xg.js";import"./IconCheckmark-nhHxBCv6.js";const W={class:"page"},x={class:"page__menu"},G={class:"page-menu__nav"},J={class:"page__wrapper"},K={class:"page__menu-left"},Q={class:"page-menu__title"},X={class:"page__content"},Y={class:"page-content__title"},Z=a("i",{class:"fa-solid fa-circle-info"},null,-1),ee={class:"submenu__title"},le={class:"page-content__desc"},ae={class:"h4-title"},se={class:"h4-title"},oe={class:"social__links"},te={key:0,class:"empty__list"},ie=["id"],ne={class:"social-link__top"},ce=["href","title"],re=["onClick"],de=["onClick"],ue=["onClick"],_e={class:"social-link__bottom"},ge={__name:"PanelProfilSocialView",setup(pe){const i=I();let c=i.getUser;const o=f(c.value.social??[]);let _=f(null),p=f(""),m=f(""),h=[],g=["artstation","btc","ethereum","xbox","playstation","patreon","earlybirds","digg","mailchimp","skype","linux","viber","threads","upwork","qq","optin-monster","weebly","unity","rebel","galactic-republic","old-republic","jedi-order","steam","bluesky","gitlab","weibo","youtube","facebook","x-twitter","instagram","pinterest","dribbble","tiktok","twitch","discord","linkedin","kickstarter","vimeo","behance","soundcloud","napster","spotify","tumblr","medium","dev","snapchat","whatsapp","phoenix-squadron"];g.sort((e,s)=>e.localeCompare(s)),h.push({key:"fa-solid fa-link",value:'<i class="fa-solid fa-link"></i> Website'}),h.push({key:"fa-solid fa-store",value:'<i class="fa-solid fa-store"></i> Store'}),g.forEach(e=>{h.push({key:"fa-brands fa-"+e,value:'<i class="fa-brands fa-'+e+'"></i> '+e})}),N(()=>{i.clearError()});async function $(e){let s=new FormData(e.target);await i.changeUserSocial(s),await i.isAuthenticated(),o.value=c.value.social,i.scrollTop(),document.getElementById("form").reset()}async function U(e){await i.changeUserSocialDelete(e),o.value=c.value.social.filter(s=>s.id!=e)}function V(e){let s=w(c.value.social,e,-1);o.value=c.value.social,console.log("Up",o.value[s],o.value[e]),o.value.forEach((l,n)=>{i.changeUserSocialSort(l.id,n)})}function C(e){w(c.value.social,e,1),o.value=c.value.social,o.value.forEach((s,l)=>{i.changeUserSocialSort(s.id,l)})}function w(e,s,l){let n=s+l;if(n<0||n==e.length)return;let d=[s,n].sort((E,B)=>E-B);e.splice(d[0],2,e[d[1]],e[d[0]])}return console.log("Social",o),(e,s)=>(u(),D(O,null,{default:P(()=>[a("div",W,[a("div",x,[a("span",null,t(e.$t("Profil")),1),a("div",G,[r(L)])]),a("div",J,[a("div",K,[a("div",Q,t(e.$t("Profil")),1),r(T)]),a("div",X,[a("div",Y,[Z,a("span",ee,t(e.$t("Social settings")),1)]),a("p",le,t(e.$t("Update social links here.")),1),r(z),a("h4",ae,t(e.$t("Update link by name")),1),a("form",{id:"form",onSubmit:q($,["prevent"]),method:"post",class:"label-color"},[r(y,{name:"name",label:e.$t("Name"),modelValue:v(p),"onUpdate:modelValue":s[0]||(s[0]=l=>b(p)?p.value=l:p=l),placeholder:e.$t("Enter name")},null,8,["label","modelValue","placeholder"]),r(R,{modelValue:v(_),"onUpdate:modelValue":s[1]||(s[1]=l=>b(_)?_.value=l:_=l),search:!1,placeholder:e.$t("No icon"),label:"Icon",name:"icon",options:v(h)},null,8,["modelValue","placeholder","options"]),r(y,{name:"url",label:e.$t("Url"),modelValue:v(m),"onUpdate:modelValue":s[2]||(s[2]=l=>b(m)?m.value=l:m=l),placeholder:e.$t("Enter url")},null,8,["label","modelValue","placeholder"]),r(H,{text:e.$t("Update")},null,8,["text"])],32),a("h4",se,t(e.$t("Social links")),1),a("div",oe,[o.value.length==0?(u(),k("div",te,t(e.$t("Add more links.")),1)):S("",!0),(u(!0),k(j,null,A(o.value,(l,n)=>(u(),k("div",{class:"social-link__box",id:"link"+l.id},[a("div",ne,[a("a",{href:l.url,title:l.url,class:"social-link__href",target:"_blank"},[l.icon?(u(),k("i",{key:0,class:F(l.icon)},null,2)):S("",!0),M(" "+t(l.name),1)],8,ce),a("i",{class:"fas fa-chevron-up social-link__up",onClick:d=>V(n)},null,8,re),a("i",{class:"fas fa-chevron-down social-link__down",onClick:d=>C(n)},null,8,de),a("i",{class:"fa-regular fa-circle-xmark social-link__delete",onClick:d=>U(l.id)},null,8,ue)]),a("div",_e,t(l.url),1)],8,ie))),256))])])])])]),_:1}))}};export{ge as default};
