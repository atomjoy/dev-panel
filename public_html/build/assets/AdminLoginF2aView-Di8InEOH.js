import{e as S,G as k,H as $,r as c,K as y,g as M,o as F,c as A,a as t,b as a,I as R,J as B,k as N,t as i,u as l,n as T,i as U,w as I,p as _,m as D,v as E,R as z,F as P,j,z as G,A as H}from"./app-B3RTu2d5.js";import{_ as J}from"./ChangeTitle-ohqnLnGr.js";import{P as K}from"./PolicyBar-CUmxrYvi.js";import{A as X}from"./AuthLogo-DpBm89Zy.js";import{I as q}from"./Input-DWRW6dml.js";import{C as O}from"./Checkbox-Cvj9LTBX.js";import"./Label-D5lgV9xg.js";import"./IconCheckmark-nhHxBCv6.js";const Q=r=>(G("data-v-051b6470"),r=r(),H(),r),W={id:"page-wraper"},Y={class:"page-auth"},Z={class:"top-bar"},x={class:"form-wraper"},ee={class:"full"},ae=Q(()=>a("i",{class:"far fa-envelope"},null,-1)),oe={class:"full"},te=["title"],se={class:"full"},le={__name:"AdminLoginF2aView",setup(r){var f;const{locale:C}=k({useScope:"global"}),s=$();let m=c(""),d=c(!1);const p=y();let u=c(((f=p==null?void 0:p.params)==null?void 0:f.hash)??null);M(()=>{s.clearError(),s.changeLocale(C.value)});function L(e){s.scrollTop(),s.loginUserF2aAdmin(new FormData(e.target))}return(e,n)=>{var g,h,v,b,V,w;return F(),A(P,null,[t(J,{title:e.$t("message.login_f2a_title")},null,8,["title"]),a("div",W,[a("div",Y,[a("div",Z,[t(X),t(R),t(B)]),a("div",x,[a("form",{onSubmit:N(L,["prevent"]),class:"form-auth"},[a("h1",ee,i(e.$t("login.F2a_Confirm"))+" "+i(e.$t("login.Admin","Admin")),1),((h=(g=l(s))==null?void 0:g.getMessage)==null?void 0:h.value)!=null?(F(),A("div",{key:0,class:T([(b=(v=l(s))==null?void 0:v.getError)!=null&&b.value?"alert-error":"alert-info","animate__animated animate__flipInX"])},i((w=(V=l(s))==null?void 0:V.getMessage)==null?void 0:w.value),3)):U("",!0),t(q,{focus:"true",type:"text",name:"code",modelValue:l(m),"onUpdate:modelValue":n[0]||(n[0]=o=>_(m)?m.value=o:m=o),placeholder:e.$t("login.F2a_code_eg"),label:e.$t("login.F2a_code")},{default:I(()=>[ae]),_:1},8,["modelValue","placeholder","label"]),D(a("input",{type:"hidden",name:"hash","onUpdate:modelValue":n[1]||(n[1]=o=>_(u)?u.value=o:u=o)},null,512),[[E,l(u)]]),a("div",oe,[t(O,{label:e.$t("login.Remember_me"),value:"1",modelValue:l(d),"onUpdate:modelValue":n[2]||(n[2]=o=>_(d)?d.value=o:d=o),name:"remember_me"},null,8,["label","modelValue"])]),a("button",{class:"button",title:e.$t("login.Login"),ref:"button"},i(e.$t("login.Login")),9,te),a("div",se,[t(l(z),{to:"/admin/password",class:"link-left"},{default:I(()=>[j(i(e.$t("login.Forgot_password")),1)]),_:1})])],32)])]),t(K)])],64)}}},_e=S(le,[["__scopeId","data-v-051b6470"]]);export{_e as default};