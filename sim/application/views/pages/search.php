<script>
function dosearch(){
	var a="s1+"+
	document.getElementById("stw").value+"+"+
	document.getElementById("num1").value+":"+
	document.getElementById("num2").value+":"+
	document.getElementById("num3").value+":"+
	document.getElementById("num4").value+":"+
	document.getElementById("num5").value+":"+
	document.getElementById("num6").value+":"+
	document.getElementById("num7").value+"+"+
	document.getElementById("network").value+"+"+
	document.getElementById("sum").value+"+"+
	document.getElementById("cat").value+"+"+
	document.getElementById("sprice").value+"+"+
	document.getElementById("nprice").value+"";
	//alert(a);
if(a=="s1+0+::::::+0+0+0+0+0"){
	alert("กรุณาเลือกเงื่อนไขก่อน");
}else{
	if(document.getElementById("sprice").value!="0"){
		if(document.getElementById("nprice").value=="0"){
			alert("กรุณาเลือกราคามากสุด");
		}else{
			window.location="<?=url::base()?>page/cat/<?=$catid ?>/0/"+a;
		}
	}else if(document.getElementById("nprice").value!="0"){
		if(document.getElementById("sprice").value=="0"){
			alert("กรุณาเลือกราคาเริ่มต้น");
		}else{
			window.location="<?=url::base()?>page/cat/<?=$catid ?>/0/"+a;
		}
	}else{
		window.location="<?=url::base()?>page/cat/<?=$catid ?>/0/"+a;
	}
	
}

}
</script>
<table style="width: 100%;" background="<?=url::base()?>css/img/nn.jpg"  >
	<tr>
		<th width="30px"></th>
		<th><font color="#000000">ค้นหาเบอร์</font></th>
		<th width="300px">&nbsp;&nbsp;&nbsp;&nbsp;<font color="#000000">เลขที่ต้องการในแต่ละหลัก</font></th>
		<th>&nbsp; <font color="#000000">เครื่อข่าย</font></th>
		<th>&nbsp;<font color="#000000"> ผลรวม</font></th>
		<th>&nbsp;<font color="#000000"> หมวด</font></th>
		<th>&nbsp;<font color="#000000"> ราคา</font></th>
		<th>&nbsp;</th>
		<th>&nbsp;<font color="#000000"> ราคา</font></th>
		<th width="200px">&nbsp;</th>
	</tr>
	<tr>
		<td></td>
		<td><select  class="form-control" style="width: 70px" id="stw">
				<option value="0">---</option>
				<option value="061">061</option>
				<option value="062">062</option>
				<option value="062">063</option>
				<option value="062">064</option>
				<option value="062">065</option>
				<option value="062">066</option>
				<option value="062">067</option>
				<option value="062">068</option>
				<option value="062">069</option>
				<option value="080">080</option>
				<option value="081">081</option>
				<option value="082">082</option>
				<option value="083">083</option>
				<option value="084">084</option>
				<option value="085">085</option>
				<option value="086">086</option>
				<option value="087">087</option>
				<option value="088">088</option>
				<option value="089">089</option>
				<option value="090">090</option>
				<option value="091">091</option>
				<option value="092">092</option>
				<option value="093">093</option>
				<option value="094">094</option>
				<option value="095">095</option>
				<option value="096">096</option>
				<option value="097">097</option>
				<option value="098">098</option>
				<option value="099">099</option>
		</select>
		</td>
		<td>&nbsp; - <input type="text"
			style="width: 30px; color: black; height: 35px;" maxlength="1"
			value="" id="num1" name="num1"> <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num2" name="num2"> <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num3" name="num3">- <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num4" name="num4"> <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num5" name="num5"> <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num6" name="num6"> <input type="text"
			style="width: 30px; color: black; height: 35px" maxlength="1"
			value="" id="num7" name="num7">


		</td>
		<td><select class="form-control" style="width: 100px" id="network">
				<option value="0">---</option>
				<?php 	
				$listnetworksim=ORM::factory("networksim")->find_all();
			foreach ($listnetworksim as $networksim){?>
				<option value="<?=$networksim->name ?>">
					<?=$networksim->name ?>
				</option>
				<?php }?>
		</select>
		</td>
		<td><select class="form-control" style="width: 70px" id="sum">
				<option value="0">---</option>
				<option value="9">9</option>
				<option value="10">10</option>
				<option value="11">11</option>
				<option value="12">12</option>
				<option value="13">13</option>
				<option value="14">14</option>
				<option value="15">15</option>
				<option value="16">16</option>
				<option value="17">17</option>
				<option value="18">18</option>
				<option value="19">19</option>
				<option value="20">20</option>
				<option value="21">21</option>
				<option value="22">22</option>
				<option value="23">23</option>
				<option value="24">24</option>
				<option value="25">25</option>
				<option value="26">26</option>
				<option value="27">27</option>
				<option value="28">28</option>
				<option value="29">29</option>
				<option value="30">30</option>
				<option value="31">31</option>
				<option value="32">32</option>
				<option value="33">33</option>
				<option value="34">34</option>
				<option value="35">35</option>
				<option value="36">36</option>
				<option value="37">37</option>
				<option value="38">38</option>
				<option value="39">39</option>
				<option value="40">40</option>
				<option value="41">41</option>
				<option value="42">42</option>
				<option value="43">43</option>
				<option value="44">44</option>
				<option value="45">45</option>
				<option value="46">46</option>
				<option value="47">47</option>
				<option value="48">48</option>
				<option value="49">49</option>
				<option value="50">50</option>
				<option value="51">51</option>
				<option value="52">52</option>
				<option value="53">53</option>
				<option value="54">54</option>
				<option value="55">55</option>
				<option value="56">56</option>
				<option value="57">57</option>
				<option value="58">58</option>
				<option value="59">59</option>
				<option value="60">60</option>
				<option value="61">61</option>
				<option value="62">62</option>
				<option value="63">63</option>
				<option value="64">64</option>
				<option value="65">65</option>
				<option value="66">66</option>
				<option value="67">67</option>
				<option value="68">68</option>
				<option value="69">69</option>
				<option value="70">70</option>
				<option value="71">71</option>
				<option value="72">72</option>
				<option value="73">73</option>
				<option value="74">74</option>
				<option value="75">75</option>
				<option value="76">76</option>
				<option value="77">77</option>
				<option value="78">78</option>
				<option value="79">79</option>
				<option value="80">80</option>
				<option value="81">81</option>
				<option value="82">82</option>
				<option value="83">83</option>
				<option value="84">84</option>
				<option value="85">85</option>
				<option value="86">86</option>
				<option value="87">87</option>
				<option value="88">88</option>
				<option value="89">89</option>
				<option value="90">90</option>
				<option value="91">91</option>
				<option value="92">92</option>
				<option value="93">93</option>
				<option value="94">94</option>
				<option value="95">95</option>
				<option value="96">96</option>
				<option value="97">97</option>
				<option value="98">98</option>
				<option value="99">99</option>
				<option value="100">100</option>
				<option value="101">101</option>
				<option value="102">102</option>
				<option value="103">103</option>
				<option value="104">104</option>
				<option value="105">105</option>
				<option value="106">106</option>
		</select>
		</td>
		<td><select class="form-control" style="width: 200px" id="cat">
				<option value="0">---</option>
				<?php 	
				$listcatsim=ORM::factory("catalogsim")->find_all();
			foreach ($listcatsim as $cat){?>
				<option value="<?=$cat->random ?>">
					<?=$cat->name ?>
				</option>
				<?php }?>
		</select>
		</td>
		<td><select class="form-control" style="width: 100px" id="sprice">
				<option value="0">---</option>
			

		</select>
		</td>
		<td><font color="#000000"><strong>ถึง</strong></font></td>
		<td><select class="form-control" style="width: 100px" id="nprice">
				<option value="0">---</option>
			

		</select>
		</td>
		<td align="center">
			<button class="btn btn-success" onclick="dosearch()" type="button">ค้นหา</button>
			<button class="btn btn-default" onclick="window.location.reload()"  type="button">ยกเลิก</button>
		</td>

	</tr>
	<tr>
		<td colspan="5"></td>
	</tr>

</table>

	<script type="text/javascript">
function dowont(val){
	//alert(val.value);
	document.getElementById("wont").value=val.value;
	
}
function doSwont(val){
	//alert(val.value);
	if(document.getElementById("wont").value==0){
		alert("กรุณาเลือกเงื่อนไขในการค้นหา");
		}else{
	var ck = "";
			if(document.getElementById("n0").checked){
				ck=ck+":"+document.getElementById("n0").value;
			}
			if(document.getElementById("n1").checked){
				ck=ck+":"+document.getElementById("n1").value;
			}
			if(document.getElementById("ns2").checked){
				ck=ck+":"+document.getElementById("ns2").value;
			}
			if(document.getElementById("n3").checked){
				ck=ck+":"+document.getElementById("n3").value;
			}
			if(document.getElementById("n4").checked){
				ck=ck+":"+document.getElementById("n4").value;
			}
			if(document.getElementById("n5").checked){
				ck=ck+":"+document.getElementById("n5").value;
			}
			if(document.getElementById("n6").checked){
				ck=ck+":"+document.getElementById("n6").value;
			}
			if(document.getElementById("n7").checked){
				ck=ck+":"+document.getElementById("n7").value;
			}
			if(document.getElementById("n8").checked){
				ck=ck+":"+document.getElementById("n8").value;
			}
			if(document.getElementById("n9").checked){
				ck=ck+":"+document.getElementById("n9").value;
			}
			document.getElementById("ck").value=ck;
			//alert(ck);
			if(ck==""){
				alert("กรุณาเลือกเบอร์ที่ต้องการหรือไม่ต้องการ");
			}else{
				document.getElementById("wontform").submit();
				window.location="<?=url::base()?>page/cat/<?=$catid ?>/0/s2+"+document.getElementById("wont").value+"+"+ck;
			}
	}

	
}
</script>
<form method="post" id="wontform"></form>
<table style="width: 100%;"  background="<?=url::base()?>css/img/nn.jpg" >
	<input type="hidden" name="wont" id="wont" value="0" />
	<input type="hidden" name="ck" id="ck" value="0" />
	<input type="hidden" name="wontf" id="wontf" value="0" />
	<?//=$detail?>

	<?php 
// 	$splist = explode("+", $detail);
// 	foreach ($splist as $sp){
// 	echo $sp."|";
// }
?>


	<tr>
		<td style="width: 10px"></td>
		<td style="width: 550px"><input type="radio" id="a" name="aa"
			value="1" onclick="dowont(this)"> <font color="#000000"><strong>เลขที่ชอบ : เลือกเฉพาะเลขที่ต้องการ</strong></font></td>
		<td><input type="checkbox" id="n0" name="n0" value="0">&nbsp;<font color="#000000"><strong>0</font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n1" name="n1" value="1">&nbsp;<font color="#000000"><strong>1</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="ns2" name="ns2" value="2">&nbsp;<font color="#000000"><strong>2</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n3" name="n3" value="3">&nbsp;<font color="#000000"><strong>3</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n4" name="n4" value="4">&nbsp;<font color="#000000"><strong>4</strong></font>&nbsp;&nbsp;&nbsp;

		</td>
		<td style="width: 160px"></td>

	</tr>
	<tr>
		<td></td>
		<td><input type="radio" id="a" name="aa" value="2"
			onclick="dowont(this)"> <font color="#000000"><strong>เลขที่ไม่ชอบ : เลือกเฉพาะเลขที่ไม่ต้องการ</strong></font></td>
		<td><input type="checkbox" id="n5" name="n5" value="5">&nbsp;<font color="#000000"><strong>5</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n6" name="n6" value="6">&nbsp;<font color="#000000"><strong>6</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n7" name="n7" value="7">&nbsp;<font color="#000000"><strong>7</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n8" name="n8" value="8">&nbsp;<font color="#000000"><strong>8</strong></font>&nbsp;&nbsp;&nbsp;
			<input type="checkbox" id="n9" name="n9" value="9">&nbsp;<font color="#000000"><strong>9</strong></font>&nbsp;&nbsp;&nbsp;
		</td>
		<td><button class="btn btn-success" type="button" onclick="doSwont()">ค้นหา</button>
			<button class="btn btn-default" type="button">ยกเลิก</button></td>
	</tr>
</table>
