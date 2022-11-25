<template>
    <div class="col-3 px-3 border border-light bg-light">
	<div class="d-flex flex-column flex-shrink-0 p-3 " style="width: 280px">
		<a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-Primary text-decoration-none">
			<svg class="bi pe-none me-2" width="40" height="32">
				<use xlink:href="#bootstrap" />
			</svg>
			<div class="avatar avatar-sm">
				<img src="https://github.com/mdo.png" alt="" width="50" height="50" class="rounded-circle me-2" />
			</div>
			<span class="">
				<h5>後台管理員</h5>
				<h6>Mandy Lee</h6>
			</span>


		</a>
		<hr width="200" />
		<ul class="nav nav-pills flex-column mb-auto">
			<li class="nav-item">
                <router-link to="/OperationMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#home" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-piggy-bank" viewBox="0 0 16 16">
						<path
							d="M5 6.25a.75.75 0 1 1-1.5 0 .75.75 0 0 1 1.5 0zm1.138-1.496A6.613 6.613 0 0 1 7.964 4.5c.666 0 1.303.097 1.893.273a.5.5 0 0 0 .286-.958A7.602 7.602 0 0 0 7.964 3.5c-.734 0-1.441.103-2.102.292a.5.5 0 1 0 .276.962z" />
						<path fill-rule="evenodd"
							d="M7.964 1.527c-2.977 0-5.571 1.704-6.32 4.125h-.55A1 1 0 0 0 .11 6.824l.254 1.46a1.5 1.5 0 0 0 1.478 1.243h.263c.3.513.688.978 1.145 1.382l-.729 2.477a.5.5 0 0 0 .48.641h2a.5.5 0 0 0 .471-.332l.482-1.351c.635.173 1.31.267 2.011.267.707 0 1.388-.095 2.028-.272l.543 1.372a.5.5 0 0 0 .465.316h2a.5.5 0 0 0 .478-.645l-.761-2.506C13.81 9.895 14.5 8.559 14.5 7.069c0-.145-.007-.29-.02-.431.261-.11.508-.266.705-.444.315.306.815.306.815-.417 0 .223-.5.223-.461-.026a.95.95 0 0 0 .09-.255.7.7 0 0 0-.202-.645.58.58 0 0 0-.707-.098.735.735 0 0 0-.375.562c-.024.243.082.48.32.654a2.112 2.112 0 0 1-.259.153c-.534-2.664-3.284-4.595-6.442-4.595zM2.516 6.26c.455-2.066 2.667-3.733 5.448-3.733 3.146 0 5.536 2.114 5.536 4.542 0 1.254-.624 2.41-1.67 3.248a.5.5 0 0 0-.165.535l.66 2.175h-.985l-.59-1.487a.5.5 0 0 0-.629-.288c-.661.23-1.39.359-2.157.359a6.558 6.558 0 0 1-2.157-.359.5.5 0 0 0-.635.304l-.525 1.471h-.979l.633-2.15a.5.5 0 0 0-.17-.534 4.649 4.649 0 0 1-1.284-1.541.5.5 0 0 0-.446-.275h-.56a.5.5 0 0 1-.492-.414l-.254-1.46h.933a.5.5 0 0 0 .488-.393zm12.621-.857a.565.565 0 0 1-.098.21.704.704 0 0 1-.044-.025c-.146-.09-.157-.175-.152-.223a.236.236 0 0 1 .117-.173c.049-.027.08-.021.113.012a.202.202 0 0 1 .064.199z" />
						<!-- 小豬ICON -->
					</svg>
					營運管理
				</router-link>
			</li>
			<li>
				<router-link to="/CommodityMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#speedometer2" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-cart4" viewBox="0 0 16 16">
						<path
							d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z" />
					</svg>
					商品管理
				</router-link>
			</li>
			<li>
				<router-link to="/OneweekDressing" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#table" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-calendar-heart" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v11a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5ZM1 14V4h14v10a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1Zm7-6.507c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
					</svg>

					一周穿搭
				</router-link>
			</li>
			<li>
				<router-link to="/ClothingMatchMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#grid" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-bag-heart" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M10.5 3.5a2.5 2.5 0 0 0-5 0V4h5v-.5Zm1 0V4H15v10a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V4h3.5v-.5a3.5 3.5 0 1 1 7 0ZM14 14V5H2v9a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1ZM8 7.993c1.664-1.711 5.825 1.283 0 5.132-5.825-3.85-1.664-6.843 0-5.132Z" />
					</svg>
					服飾搭配
				</router-link>
			</li>
			<hr width="200" />
			<li>
				<router-link to="/OperationMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#grid" />
					</svg>

					帳號管理
				</router-link>
			</li>
			<li>
				<router-link to="/MemberMgmt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#grid" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-emoji-heart-eyes" viewBox="0 0 16 16">
						<path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z" />
						<path
							d="M11.315 10.014a.5.5 0 0 1 .548.736A4.498 4.498 0 0 1 7.965 13a4.498 4.498 0 0 1-3.898-2.25.5.5 0 0 1 .548-.736h.005l.017.005.067.015.252.055c.215.046.515.108.857.169.693.124 1.522.242 2.152.242.63 0 1.46-.118 2.152-.242a26.58 26.58 0 0 0 1.109-.224l.067-.015.017-.004.005-.002zM4.756 4.566c.763-1.424 4.02-.12.952 3.434-4.496-1.596-2.35-4.298-.952-3.434zm6.488 0c1.398-.864 3.544 1.838-.952 3.434-3.067-3.554.19-4.858.952-3.434z" />
					</svg>
					會員管理
				</router-link>
			</li>
			<li>
				<router-link to="/StaffMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#grid" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-award" viewBox="0 0 16 16">
						<path
							d="M9.669.864 8 0 6.331.864l-1.858.282-.842 1.68-1.337 1.32L2.6 6l-.306 1.854 1.337 1.32.842 1.68 1.858.282L8 12l1.669-.864 1.858-.282.842-1.68 1.337-1.32L13.4 6l.306-1.854-1.337-1.32-.842-1.68L9.669.864zm1.196 1.193.684 1.365 1.086 1.072L12.387 6l.248 1.506-1.086 1.072-.684 1.365-1.51.229L8 10.874l-1.355-.702-1.51-.229-.684-1.365-1.086-1.072L3.614 6l-.25-1.506 1.087-1.072.684-1.365 1.51-.229L8 1.126l1.356.702 1.509.229z" />
						<path d="M4 11.794V16l4-1 4 1v-4.206l-2.018.306L8 13.126 6.018 12.1 4 11.794z" />
					</svg>
					員工管理
				</router-link>
			</li>
			<hr width="200" />
			<li>
				<router-link to="/OperationMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#grid" />
					</svg>

					帳號管理
				</router-link>
			</li>
			<li>
				<router-link to="/OrderMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#people-circle" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-bookmark-check" viewBox="0 0 16 16">
						<path fill-rule="evenodd"
							d="M10.854 5.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 7.793l2.646-2.647a.5.5 0 0 1 .708 0z" />
						<path
							d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
					</svg>
					訂單管理
				</router-link>
			</li>
			<li>
				<router-link to="/SubscriptionMgmt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#people-circle" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-bookmark-star" viewBox="0 0 16 16">
						<path
							d="M7.84 4.1a.178.178 0 0 1 .32 0l.634 1.285a.178.178 0 0 0 .134.098l1.42.206c.145.021.204.2.098.303L9.42 6.993a.178.178 0 0 0-.051.158l.242 1.414a.178.178 0 0 1-.258.187l-1.27-.668a.178.178 0 0 0-.165 0l-1.27.668a.178.178 0 0 1-.257-.187l.242-1.414a.178.178 0 0 0-.05-.158l-1.03-1.001a.178.178 0 0 1 .098-.303l1.42-.206a.178.178 0 0 0 .134-.098L7.84 4.1z" />
						<path
							d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z" />
					</svg>
					訂閱服務
				</router-link>
			</li>
			<li>
				<router-link to="/AppointmentMgnt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#people-circle" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-chat-dots" viewBox="0 0 16 16">
						<path
							d="M5 8a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm4 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm3 1a1 1 0 1 0 0-2 1 1 0 0 0 0 2z" />
						<path
							d="m2.165 15.803.02-.004c1.83-.363 2.948-.842 3.468-1.105A9.06 9.06 0 0 0 8 15c4.418 0 8-3.134 8-7s-3.582-7-8-7-8 3.134-8 7c0 1.76.743 3.37 1.97 4.6a10.437 10.437 0 0 1-.524 2.318l-.003.011a10.722 10.722 0 0 1-.244.637c-.079.186.074.394.273.362a21.673 21.673 0 0 0 .693-.125zm.8-3.108a1 1 0 0 0-.287-.801C1.618 10.83 1 9.468 1 8c0-3.192 3.004-6 7-6s7 2.808 7 6c0 3.193-3.004 6-7 6a8.06 8.06 0 0 1-2.088-.272 1 1 0 0 0-.711.074c-.387.196-1.24.57-2.634.893a10.97 10.97 0 0 0 .398-2z" />
					</svg>
					會員諮詢預約
				</router-link>
			</li>
			<li>
				<router-link to="/ClientMgmt" class="nav-link text-Primary">
					<svg class="bi pe-none me-2" width="16" height="16">
						<use xlink:href="#people-circle" />
					</svg>
					<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
						class="bi bi-chat-left-text" viewBox="0 0 16 16">
						<path
							d="M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1H4.414A2 2 0 0 0 3 11.586l-2 2V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12.793a.5.5 0 0 0 .854.353l2.853-2.853A1 1 0 0 1 4.414 12H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z" />
						<path
							d="M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z" />
					</svg>
					廠商留言
				</router-link>
			</li>
		</ul>

	</div>
</div>
</template>
<script>
export default{
    // props:{
    //     link:String,
    // }
}
</script>