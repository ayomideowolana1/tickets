// let { createApp } = Vue;

let tickets = Array.from(document.querySelectorAll(".ticket"))

tickets.forEach(ticket =>{
    let id = ticket.dataset.ticketid
    console.log(id)
})

// createApp({
//     data(){},
//     methods(){},
//     mounted(){}
// }).mount("#create-ticket")