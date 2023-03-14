let { createApp } = Vue;

function formatDate(dateString) {
  const date = new Date(dateString);
  const day = date.getDate().toString().padStart(2, "0");
  const month = (date.getMonth() + 1).toString().padStart(2, "0");
  const year = date.getFullYear().toString();
  const hour = date.getHours();
  const minute = date.getMinutes().toString().padStart(2, "0");
  const meridian = hour >= 12 ? "pm" : "am";
  const formattedHour = hour > 12 ? (hour - 12).toString() : hour.toString();
  const formattedTime = `${formattedHour}:${minute}${meridian}`;
  return `${day}/${month}/${year} - ${formattedTime}`;
}

let url = "./api/get-tickets.php";

$.post(url, {}, function (res) {
  let data = JSON.parse(res);
  // console.log(data)

  createApp({
    data() {
      return {
        message: "",
        title: "",
        tickets: data,
        count: 0,
        ticketDetailsFetched: false,
        ticketData:[]
      };
    },
    methods: {
      // view details
      viewDetails(e) {
        let ticketID = e.target.dataset.ticketid;
        let that = this;
        let url = "./api/get-ticket-data.php";
        $.post(url, { ticketID }, function (res) {
          // console.log(JSON.parse(res))
          let data = JSON.parse(res)
          that.ticketData = data[0]
          that.ticketData.created_at = formatDate(that.ticketData.created_at)
          that.ticketDetailsFetched = 1
          console.log(that.ticketData)
        });
      },
      // close a ticket
      closeTicket(e) {
        let ticketID = e.target.dataset.ticketid;
        let url = "./api/close-ticket.php";
        $.post(url, { ticketID }, function (res) {
          if (res) {
            location.reload();
          }
        });
      },
      // reopen a ticket
      reopenTicket(e) {
        let ticketID = e.target.dataset.ticketid;
        let url = "./api/reopen-ticket.php";
        $.post(url, { ticketID }, function (res) {
          if (res) {
            location.reload();
          }
        });
      },
      // get all tickets
      getTickets() {
        const { setTickets } = this;
        $.post(url, {}, function (res) {
          this.setTickets(res);
        });
      },
    },
    mounted() {},
  }).mount("#create-ticket");
});
