import{e as m,G as p,H as f,K as v,g as h,o as c,c as i,a,b as e,I as g,J as w,t as l,u as r,n as k,i as y,w as n,R as _,F as A,j as u}from"./app-DZXZncAK.js";import{_ as V}from"./ChangeTitle-BLBR2AyT.js";import{P as $}from"./PolicyBar-CJGSVF5k.js";import{A as C}from"./AuthLogo-DS11e-Ej.js";const b={id:"page-wraper"},B={class:"page-auth"},I={class:"top-bar"},L={class:"form-wraper"},N={class:"form-auth"},q={class:"full"},E={class:"full"},F={class:"alert-default"},M={class:"full mb"},R={__name:"ActivateView",setup(S){const{t:D,locale:d}=p({useScope:"global"}),t=f(),s=v();return h(()=>{t.clearError(),s.query.locale&&(d.value=s.query.locale,t.changeLocale(s.query.locale)),t.activateUser(s.params.id,s.params.code)}),(o,H)=>(c(),i(A,null,[a(V,{title:o.$t("message.activate_title")},null,8,["title"]),e("div",b,[e("div",B,[e("div",I,[a(C),a(g),a(w)]),e("div",L,[e("form",N,[e("h1",q,l(o.$t("activate.Activation")),1),r(t).getMessage.value!=null?(c(),i("div",{key:0,class:k([r(t).getError.value?"alert-error":"alert-info","animate__animated animate__flipInX"])},l(r(t).getMessage.value),3)):y("",!0),e("div",E,[e("p",F,l(o.$t("activate.Description")),1)]),e("div",M,[a(r(_),{to:"/login",class:"link-left"},{default:n(()=>[u(l(o.$t("activate.Have_an_account")),1)]),_:1}),a(r(_),{to:"/password",class:"link-right"},{default:n(()=>[u(l(o.$t("activate.Forgot_password")),1)]),_:1})])])])]),a($)])],64))}},G=m(R,[["__scopeId","data-v-939637fd"]]);export{G as default};
