import{e as k,o as w,c as C,b as e,t as r,z as U,A as y,G as R,H as B,r as c,g as F,a as t,I as H,J as L,k as P,u as a,n as A,i as E,w as d,p,R as v,F as N,j as b}from"./app-CWJsVgBr.js";import{_ as G}from"./ChangeTitle-DuHbwkZr.js";import{P as V}from"./Password-C_G2wOYx.js";import{C as Z}from"./Checkbox-CO8H0lPx.js";import{I as S}from"./Input-CRcsHsHB.js";import{P as T}from"./PolicyBar-BsUQ_xjB.js";import{A as z}from"./AuthLogo-Cro9xgrR.js";import"./Label-ve2X6nto.js";import"./IconCheckmark-BBWdvKIz.js";/* empty css                                                              */const D={},I=s=>(U("data-v-ed9349f1"),s=s(),y(),s),j={class:"social-login-buttons"},J=["title"],O={class:"social-login-btn social-google-btn"},X=I(()=>e("svg",{xmlns:"http://www.w3.org/2000/svg",width:"18",height:"18",viewBox:"0 0 18 18",fill:"none",role:"img",class:"icon"},[e("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M17.64 9.20419C17.64 8.56601 17.5827 7.95237 17.4764 7.36328H9V10.8446H13.8436C13.635 11.9696 13.0009 12.9228 12.0477 13.561V15.8192H14.9564C16.6582 14.2524 17.64 11.9451 17.64 9.20419Z",fill:"#4285F4"}),e("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M8.99976 18C11.4298 18 13.467 17.1941 14.9561 15.8195L12.0475 13.5613C11.2416 14.1013 10.2107 14.4204 8.99976 14.4204C6.65567 14.4204 4.67158 12.8372 3.96385 10.71H0.957031V13.0418C2.43794 15.9831 5.48158 18 8.99976 18Z",fill:"#34A853"}),e("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M3.96409 10.7098C3.78409 10.1698 3.68182 9.59301 3.68182 8.99983C3.68182 8.40664 3.78409 7.82983 3.96409 7.28983V4.95801H0.957273C0.347727 6.17301 0 7.54755 0 8.99983C0 10.4521 0.347727 11.8266 0.957273 13.0416L3.96409 10.7098Z",fill:"#FBBC05"}),e("path",{"fill-rule":"evenodd","clip-rule":"evenodd",d:"M8.99976 3.57955C10.3211 3.57955 11.5075 4.03364 12.4402 4.92545L15.0216 2.34409C13.4629 0.891818 11.4257 0 8.99976 0C5.48158 0 2.43794 2.01682 0.957031 4.95818L3.96385 7.29C4.67158 5.16273 6.65567 3.57955 8.99976 3.57955Z",fill:"#EA4335"})],-1)),q=["title"],K={class:"social-login-btn social-github-btn"},Q=I(()=>e("i",{class:"fa-brands fa-github"},null,-1)),W={class:"social-login-buttons-text"};function Y(s,$){return w(),C("div",j,[e("a",{href:"/oauth/google/redirect",title:s.$t("login.Sign_Up_Google")},[e("div",O,[X,e("span",null,r(s.$t("login.Sign_Up_Google")),1)])],8,J),e("a",{href:"/oauth/github/redirect",title:s.$t("login.Sign_Up_Github")},[e("div",K,[Q,e("span",null,r(s.$t("login.Sign_Up_Github")),1)])],8,q),e("div",W,[e("span",null,r(s.$t("login.Sign_Up_Or")),1)])])}const x=k(D,[["render",Y],["__scopeId","data-v-ed9349f1"]]),h=s=>(U("data-v-ed63cfc9"),s=s(),y(),s),ee={id:"page-wraper"},le={class:"page-auth"},se={class:"top-bar"},oe={class:"form-wraper"},te={class:"full"},ae=h(()=>e("i",{class:"far fa-user"},null,-1)),ie=h(()=>e("i",{class:"far fa-envelope"},null,-1)),re=h(()=>e("i",{class:"fa-solid fa-key"},null,-1)),de=h(()=>e("i",{class:"fa-solid fa-key"},null,-1)),ne={class:"full"},ue={class:"full"},ce=["title","disabled"],pe={class:"full"},ge={__name:"RegisterView",setup(s){const{t:$,locale:_e}=R({useScope:"global"}),n=B();let g=c(""),_=c(""),m=c(""),f=c(""),u=c(!1);F(()=>{n.clearError()});function M(l){u.value?(n.scrollTop(),n.registerUser(new FormData(l.target))):alert($("register.Confirm_services"))}return(l,i)=>(w(),C(N,null,[t(G,{title:l.$t("message.register_title")},null,8,["title"]),e("div",ee,[e("div",le,[e("div",se,[t(z),t(H),t(L)]),e("div",oe,[e("form",{onSubmit:P(M,["prevent"]),class:"form-auth",id:"registerForm"},[e("h1",te,r(l.$t("register.Sign_Up")),1),t(x),a(n).getMessage.value!=null?(w(),C("div",{key:0,class:A([a(n).getError.value?"alert-error":"alert-info","animate__animated animate__flipInX"])},r(a(n).getMessage.value),3)):E("",!0),t(S,{focus:"true",type:"text",name:"name",modelValue:a(g),"onUpdate:modelValue":i[0]||(i[0]=o=>p(g)?g.value=o:g=o),placeholder:l.$t("register.Name_eg"),label:l.$t("register.Name")},{default:d(()=>[ae]),_:1},8,["modelValue","placeholder","label"]),t(S,{type:"text",name:"email",modelValue:a(_),"onUpdate:modelValue":i[1]||(i[1]=o=>p(_)?_.value=o:_=o),placeholder:l.$t("register.Email_address_eg"),label:l.$t("register.Email_address")},{default:d(()=>[ie]),_:1},8,["modelValue","placeholder","label"]),t(V,{type:"password",name:"password",modelValue:a(m),"onUpdate:modelValue":i[2]||(i[2]=o=>p(m)?m.value=o:m=o),placeholder:l.$t("register.Password_eg"),label:l.$t("register.Password")},{default:d(()=>[re]),_:1},8,["modelValue","placeholder","label"]),t(V,{type:"password",name:"password_confirmation",modelValue:a(f),"onUpdate:modelValue":i[3]||(i[3]=o=>p(f)?f.value=o:f=o),placeholder:l.$t("register.Confirm_password_eg"),label:l.$t("register.Confirm_password")},{default:d(()=>[de]),_:1},8,["modelValue","placeholder","label"]),e("div",ne,[t(Z,{label:l.$t("register.Confirm_services"),value:"1",modelValue:a(u),"onUpdate:modelValue":i[4]||(i[4]=o=>p(u)?u.value=o:u=o),name:"confirm_services"},null,8,["label","modelValue"]),t(a(v),{to:"/docs/services",class:"link-policy",target:"_blank"},{default:d(()=>[b(r(l.$t("register.Policy")),1)]),_:1})]),e("div",ue,[e("button",{class:"button",title:l.$t("register.Register"),disabled:!a(u)},r(l.$t("register.Register")),9,ce)]),e("div",pe,[t(a(v),{to:"/login",class:"link-left"},{default:d(()=>[b(r(l.$t("register.Have_an_account")),1)]),_:1}),t(a(v),{to:"/password",class:"link-right"},{default:d(()=>[b(r(l.$t("register.Forgot_password")),1)]),_:1})])],32)])]),t(T)])],64))}},ke=k(ge,[["__scopeId","data-v-ed63cfc9"]]);export{ke as default};