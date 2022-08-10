<section id="_apps_etalk_content">
	<form id="frmSurvey" onsubmit="return checkSurvey()">
		<div class="row">
			<p>1. 학생 본인이 코로나19가 의심되는 아래의 임상증상<sup>*</sup>이 있나요?</p>
			<p>* (주요임상증상) 발열(37.5℃ 이상), 기침, 호흡곤란, 오한, 근육통, 두통, 인후통, 후각·미각소실</p>
			<p>※ 단 학교에서 선별진료소 검사결과(음성)을 확인 후 등교를 허용한 경우, 또는 선천성질환·만성질환(천식 등)으로 인한 증상인 경우 '아니오'를 선택하세요.</p>
			<div class="_chkbox_group">
				<input type="radio" name="covid_survey_q1" class="survey_radio" id="q1_no" value="0">
				<label class="survey_radio_label" for="q1_no">아니오</label>
				<input type="radio" name="covid_survey_q1" class="survey_radio" id="q1_yes" value="0">
				<label class="survey_radio_label" for="q1_yes">예</label>
			</div>
		</div>
		<div class="row">
			<p>2. 학생 본인은 오늘(어제 저녁 포함) 신속항원검사(자가진단)를 실시했나요?</p>
			<p>※ 코로나19 완치자의 경우, 확진일로부터 45일간 신속항원검사(자가진단)는 실시하지 않음("검사하지 않음"으로 선택)</p>
			<div class="_chkbox_group">
				<input type="radio" name="covid_survey_q2" class="survey_radio" id="q2_notscan" value="-1">
				<label class="survey_radio_label" for="q2_notscan">검사하지않음</label>
				<input type="radio" name="covid_survey_q2" class="survey_radio" id="q2_negative" value="0">
				<label class="survey_radio_label" for="q2_negative">음성</label>
				<input type="radio" name="covid_survey_q2" class="survey_radio" id="q2_positive" value="1">
				<label class="survey_radio_label" for="q2_positive">양성</label>
			</div>
		</div>
		<div class="row">
			<p>3. 학생 본인이 PCR등 검사를 받고 그 결과를 기다리고 있나요?</p>
			<div class="_chkbox_group">
				<input type="radio" name="covid_survey_q3" class="survey_radio" id="q3_no" value="0">
				<label class="survey_radio_label" for="q3_no">아니오</label>
				<input type="radio" name="covid_survey_q3" class="survey_radio" id="q3_yes" value="1">
				<label class="survey_radio_label" for="q3_yes">예</label>
			</div>
		</div>
		<div class="row">
			<button type="submit" class="btn save">제출</button>
		</div>
	</form>
</section>