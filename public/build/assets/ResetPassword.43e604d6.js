import{u as c,o as f,c as w,w as n,a,b as e,H as _,d as r,n as V,e as b,f as g}from"./app.797cfd60.js";import{_ as k,a as v}from"./Guest.9c56feb9.js";import{_ as l,a as i,b as m}from"./Label.439a77eb.js";import"./ApplicationLogo.fabcc48b.js";const x=["onSubmit"],y={class:"mt-4"},P={class:"mt-4"},$={class:"flex items-center justify-end mt-4"},S=g(" Reset Password "),R={__name:"ResetPassword",props:{email:String,token:String},setup(u){const d=u,s=c({token:d.token,email:d.email,password:"",password_confirmation:""}),p=()=>{s.post(route("password.update"),{onFinish:()=>s.reset("password","password_confirmation")})};return(h,o)=>(f(),w(k,null,{default:n(()=>[a(e(_),{title:"Reset Password"}),r("form",{onSubmit:b(p,["prevent"])},[r("div",null,[a(l,{for:"email",value:"Email"}),a(i,{id:"email",type:"email",class:"mt-1 block w-full",modelValue:e(s).email,"onUpdate:modelValue":o[0]||(o[0]=t=>e(s).email=t),required:"",autofocus:"",autocomplete:"username"},null,8,["modelValue"]),a(m,{class:"mt-2",message:e(s).errors.email},null,8,["message"])]),r("div",y,[a(l,{for:"password",value:"Password"}),a(i,{id:"password",type:"password",class:"mt-1 block w-full",modelValue:e(s).password,"onUpdate:modelValue":o[1]||(o[1]=t=>e(s).password=t),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(m,{class:"mt-2",message:e(s).errors.password},null,8,["message"])]),r("div",P,[a(l,{for:"password_confirmation",value:"Confirm Password"}),a(i,{id:"password_confirmation",type:"password",class:"mt-1 block w-full",modelValue:e(s).password_confirmation,"onUpdate:modelValue":o[2]||(o[2]=t=>e(s).password_confirmation=t),required:"",autocomplete:"new-password"},null,8,["modelValue"]),a(m,{class:"mt-2",message:e(s).errors.password_confirmation},null,8,["message"])]),r("div",$,[a(v,{class:V({"opacity-25":e(s).processing}),disabled:e(s).processing},{default:n(()=>[S]),_:1},8,["class","disabled"])])],40,x)]),_:1}))}};export{R as default};