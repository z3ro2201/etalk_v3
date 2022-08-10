				<section id="_apps_etalk_login">
					<form method="post">
						<div class="inputGroup">
							<input type="text" id="etalk_txtSchoolName" autocomplete="off" onfocus="ios_fixed(this)" onfocusout="ios_fixed_out(this)" list="schoolList" onchange="toggleData();" required>
							<label for="etalk_txtSchoolName">
								<span>
									<i class="las la-graduation-cap"></i>학교명
								</span>
							</label>
							<datalist id="schoolList">
							</datalist>
						</div>
						<div class="inputGroup">
							<input type="text" id="etalk_txtUserName" autocomplete="off" onfocus="ios_fixed(this)" onfocusout="ios_fixed_out(this)" onchange="toggleData();" required>
							<label for="etalk_txtUserName">
								<span>
									<i class="las la-user"></i>성명
								</span>
							</label>
						</div>
						<div class="field">
							<input type="checkbox" name="" id="chkAgreement" onclick="" onchange="openModal(this)">
							<label for="chkAgreement">시스템 이용약관을 읽고 동의합니다.</label>
						</div>
						<button type="submit" class="btn login" disabled>로그인</button>
					</form>
				</section>
				<div class="modal">
					<div class="modalBody">
						<h4 class="modalTitle">사용자 정보 제공 및 저장에 관한 동의</h4>
						<span class="modalText">
							본 시스템은 사용자의 기본정보 및 건강상태진단결과를 수집하며, 사용자의 편의를 위해 사용자정보 일부를 단말기에 저장하고 있습니다.<br/>
							단말기에 저장되는 정보는 암호화된 세션 인증코드이며, 개인정보의 접근 차단을 위해 사용자가 지정한 암호를 입력해야만<br/>
							시스템에 접근할 수 있도록 하였습니다.<br/><br/>
							시스템에 저장되는 항목은 아래와 같습니다.<br/>
							1. 소속학교명<br/>
							2. 학생성명<br/>
							3. 접속IP<br/>
							4. 진단항목 및 진단일<br/>
							<br/>
							수집되는 정보는 목적 달성시 담당선생님에 의해 복구할 수 없도록 즉시 파기 됩니다.<br/>
							만약 원치 않는 경우 본인의 의사에 따라 직접 삭제를 할 수 있습니다.
						</span>
						<div class="fieldButton">
							<button type="submit" class="btn agreement agree">동의</button>
							<button type="submit" class="btn agreement cancel">비동의</button>
						</div>
					</div>
					<div id="make_scrollable"></div>
				</div>
				<script src="/public/script/healthCheck.js?no-cache=<?php echo time(); ?>"></script>
				<script>
					function toggleData() {
						const txtSchool = document.querySelector('#etalk_txtSchoolName').value;
						const txtUser = document.querySelector('#etalk_txtUserName').value;
						const chkAgreement = document.querySelector('#chkAgreement');
						if(txtSchool && txtUser && (chkAgreement.checked !== false)) {
							document.querySelector('.btn.login').disabled = false;
						} else {
							document.querySelector('.btn.login').disabled = true;
						}
					}
					function ios_fixed(e) {
						e.classList.add('.ios_issue_fixed')
					}
					function ios_fixed_out(e) {
						e.classList.remove('.ios_issue_fixed')
					}
					function openModal(e){
						let modal = document.querySelector('.modal');
						if(e.checked == true) modal.classList.add('active');
						else modal.classList.remove('active');
						console.log(e.checked);
					}
				</script>