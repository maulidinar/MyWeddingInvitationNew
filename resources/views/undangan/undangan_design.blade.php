<style>

    body {
  background: #fff;
  font-family: 'Montserrat', sans-serif !important;
  margin: 0;
  padding: 0;
}
.ticket {
  display: flex;
  justify-content: center;
  align-items: center;
  width: 700px;
  margin: 20px auto;
  border: 1px solid;
}
.ticket .stub,
.ticket .check {
  box-sizing: border-box;
}
.stub {
  background: #e51b24;
  height: 250px;
  width: 250px;
  color: white;
  padding: 20px;
  position: relative;
}
.stub:before {
  content: '';
  position: absolute;
  top: 0;
  right: 0;
  border-top: 20px solid #e51b24;
  border-left: 20px solid #e51b24;
  width: 0;
}
.stub:after {
  content: '';
  position: absolute;
  bottom: 0;
  right: 0;
  border-bottom: 20px solid #e51b24;
  border-left: 20px solid #e51b24;
  width: 0;
}
.stub .top {
  display: flex;
  align-items: center;
  height: 40px;
  text-transform: uppercase;
}
.stub .top .line {
  display: block;
  background: #000;
  height: 40px;
  width: 3px;
  margin: 0 20px;
}
.stub .top .num {
  font-size: 10px;
}
.stub .top .num span {
  color: #000;
}
.stub .number {
  position: absolute;
  left: 40px;
  font-size: 150px;
}
.stub .invite {
  position: absolute;
  left: 100px;
  bottom: 45px;
  color: #000;
  width: 20%;
}
.stub .invite:before {
  content: '';
  background: #fff;
  display: block;
  width: 40px;
  height: 3px;
  margin-bottom: 5px;
}
.check {
  background: #fff;
  height: 250px;
  width: 450px;
  padding: 30px;
  position: relative;
}
.check:before {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  border-top: 20px solid #e51b24;
  border-right: 20px solid #fff;
  width: 0;
}
.check:after {
  content: '';
  position: absolute;
  bottom: 0;
  left: 0;
  border-bottom: 20px solid #e51b24;
  border-right: 20px solid #fff;
  width: 0;
}
.check .big {
  font-size: 35px;
  font-weight: 900;
  line-height: 1em;
}
.check .number {
  position: absolute;
  top: 35px;
  right: 10px;
  color: #e51b24;
  font-size: 25px;
}
.check .info {
  display: flex;
  justify-content: flex-start;
  font-size: 12px;
  margin-top: 50px;
  width: 100%;
}
.check .info section {
  margin-right: 50px;
}
.check .info section:before {
  content: '';
  background: #ef5658;
  display: block;
  width: 40px;
  height: 3px;
  margin-bottom: 5px;
}
.check .info section .title {
  font-size: 10px;
  text-transform: uppercase;
  font-weight: 600;
  margin-bottom: 2px;
}
.qrcode {
  width: 200px;
    top: 80px;
    left: 1px;
    position: relative;
}
 @media print {
    * {
        -webkit-print-color-adjust: exact;
    }
</style>

<!-- CSS Ticket inspired by -->
<!-- https://dribbble.com/shots/2677752-Dribbble-invite-competition -->

<div class="ticket" onload="window.print()">
    <div class="stub">
        <div class="top">
            {{-- <span class="admit">Admit</span> --}}
            {{-- <span class="line"></span> --}}
            <span class="num">
                <span>
                    <img class="qrcode"src="{{ asset('qrcodes/'.$dataTicket->id.'.png') }}" align="right" />
                </span>
            </span>
        </div>
        {{-- <div class="number">1</div> --}}
        {{-- <div class="invite">
            Nama Ku
        </div> --}}
    </div>
    <div class="check">
        <div class="big">
            You're <br> Invited <br> <span style="color: #e51b24;">{{ $dataTicket->show }}</span>
        </div>
        <div class="number">#{{ $dataTicket->code }}</div>
        <div class="info">
            <section>
                <div class="title">Date Start:</div>
                <div>{{ date("d M Y", strtotime($dataTicket->show_date_start)) }}</div>
            </section>
            <section>
                <div class="title">Date End:</div>
                <div>{{ date("d M Y", strtotime($dataTicket->show_date_end)) }}</div>
            </section>
            {{-- <section>
                <div class="title">Invite Number:</div>
                <div>31415926</div>
            </section> --}}
        </div>
    </div>
</div>

<script type="text/javascript">

   setTimeout(function() {
    window.print();
   }, 100);
</script>