import React from 'react'
import { useState, useEffect } from 'react'


export const JustAcomponent = () => {
    var content = null;
    const [state, setState] = useState({"id":"aun no carga"})
    function helper(v){
        setState(v)
        console.log(v)
    }

    useEffect(() => {
        //Runs only on the first render
        (async () => {
            const rawResponse = await fetch('http://localhost/user/1/payments/0', {
              method: 'GET',
              // headers: {
              //   'Accept': 'application/json',
              //   'Content-Type': 'application/json'
              // },
              // body: JSON.stringify({a: 1, b: 'Textual content'})
            });
            content = await rawResponse.json();
            // console.log(content)
            helper(content);
          })();
      }, []);



  return (
    <div>{state["id"]}</div>
  )
}
