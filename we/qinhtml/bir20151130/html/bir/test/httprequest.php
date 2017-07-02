<?php
/* PageCookery Microblog
*
* Author: Explon
*
* Copyright (C) 2007 Explon <explon@gmail.com>
*/

require_once("global.php");

Helper::NoCacheHeader();

switch ($act)
{
	case 'get_build':
		echo json_encode(array(
			'version' => $pcm_version,
			'build' => $pcm_build
		)); 
	break;
	
	case 'install_skin':
		if ($is_guest OR $User['id'] != 1)
		{
			show_login();
		}
		
		if ($_GET['id'])
		{
			$json = @json_decode(@file_get_contents('http://www.pagecookery.com/skin_source/' . $_GET['id'] . '.json'), TRUE);
			
			if ($json['style'])
			{
				if (is_really_writable('css/skin/') AND is_really_writable('memory/'))
				{
					$skin_name = $json['style'];
					
					@mkdir('memory/' . $skin_name . '/');
					
					foreach ($json['css'] AS $filename => $string)
					{
						if (strstr($filename, '.php') OR strstr($filename, '.phtml'))
						{
							
						}
						else if (strstr($filename, '.css'))
						{
							file_put_contents('css/skin/' . $filename, base64_decode($string));
						}
					}
					
					foreach ($json['image'] AS $filename => $string)
					{
						if (strstr($filename, '.php') OR strstr($filename, '.phtml'))
						{
							
						}
						else
						{
							file_put_contents('memory/' . $skin_name . '/' . $filename, base64_decode($string));
						}
					}
					
					$db->update('user', array('skin' => $skin_name), array('id' => 1));
					
					Helper::PrintJavaScript("alert('皮肤: " . $skin_name . " 已安装完成, 并设置为默认皮肤.'); window.close();");
				}
				else
				{
					Helper::PrintJavaScript("alert('请先设置下列目录权限 (CHMOD) 为 777: css/skin/, memory/ .'); window.close();");
				}
			}
			else
			{
				Helper::PrintJavaScript("alert('皮肤源不存在, 或当前服务器无法访问 PageCookery.Com.'); window.close();");
			}
		}
	break;
	
	case 'cron':
		$_config = array(
			'rss_update' => array(
				'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
				'distance' => 3600,
				'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/rss_update.php'
			)
		);
		
		$_config['rss_import'] = array(
			'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
			'distance' => 900,
			'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/rss_import.php'
		);
		
		$_config['follow_import'] = array(
			'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
			'distance' => 300,
			'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/follow_import.php'
		);
		
		$_config['follow_update'] = array(
			'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
			'distance' => 3600 * 6,
			'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/follow_update.php'
		);
		
		if ($Own['lastfm'])
		{
			$_config['last_fm_update'] = array(
				'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
				'distance' => 180,
				'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/last_fm_update.php'
			);
		}
		
		if ($sync['api']['import'] == 'true')
		{
			$_config['api_import'] = array(
				'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
				'distance' => 60,
				'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/api_import.php'
			);
		}
		
		if ($flickr['feed'])
		{
			$_config['flickr_sync'] = array(
				'cache_root' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cache/',
				'distance' => 300,
				'script_location' => str_replace(basename($_SERVER['PHP_SELF']), '', __FILE__) . 'cron/flickr_sync.php'
			);
		}
	
		$_global = array('db', 'config', 'Own', 'sync', 'flickr', 'pcm_version', 'pcm_build');
	
		require_once('lib/class_cron.php');
	
		new Cron($_config, $_global);
	break;
	
	case 'sendreply':
		if ($options['allow_comment'] == 'false')
		{
			Helper::PrintJavaScript("alert('对方评论功能已经关闭'); window.location = '" . BASE_URL . "?act=view&id=" . intval($_POST['entryid']) . "';");
		}
		
		if (intval($_POST['entryid']) > 0 AND trim($_POST['message']))
		{
			if ($is_guest)
			{
				require_once('lib/class_iplocation.php');
			
				$iplocation = new IpLocation('database/QQWry.Dat');

				$location = $iplocation->getlocation(Helper::FetchIP());
			
				$geo = $location['country'];
			}
			else
			{
				$geo = 'owner';
			}
			
			$data = array(
				'entryid' => intval($_POST['entryid']),
				'message' => Format::Safe($_POST['message'], true),
				'geo' => $geo,
				'ip' => Helper::FetchIP(),
				'time' => time(),
				'userid' => $User['id'],
				'nickname' => Format::Safe($_POST['nickname'], true)
			);
			
			if (!$User['id'])
			{
				unset($data['userid']);
			}
			
			$db->insert('reply', $data);
			
			Helper::BakeCookie('nickname', $_POST['nickname'], time() + 3600 * 24 * 30);
			
			if ($_POST['byquick'] == 'TRUE')
			{
				Helper::PrintJavaScript("window.location = '" . BASE_URL . "?act=view&id=" . intval($_POST['entryid']) . "';");
			}
			else if ($_POST['bymobile'] == 'TRUE')
			{
				header('Location: ' . BASE_URL . 'm/?act=view&id=' . intval($_POST['entryid']));
				exit;
			}
			else
			{
				echo 'done';
			}
		}
		else if ($_POST['bymobile'] == 'TRUE')
		{
			header('Location: ' . BASE_URL . 'm/?act=view&id=' . intval($_POST['entryid']));
			exit;
		}
	break;
	
	case 'getreply':
		$reply = $db->query("SELECT * FROM reply WHERE entryid = " . intval($_GET['entryid']))->result_array();
		
		foreach ($reply AS $key => $item)
		{
			$ip = explode('.', $item['ip']);
			
			echo '<li>';
			
			if ($item['userid'] > 0)
			{
				echo '<span style="color:red">' . get_username_by_id($item['userid']) . ':</span>';
			}
			else if ($item['geo'] == 'owner')
			{
				echo '<span style="color:red">' . _t('博主') . ':</span>';
			}
			else if ($item['nickname'])
			{
				echo '<span style="color:#666"><strong>' . $item['nickname'] . '</strong> ' . $item['geo'] . ' (' . $ip[0] . '.' . $ip[1] . '.' . $ip[2] . '.*):</span>';
			}
			else
			{
				echo '<span style="color:#666">' . $item['geo'] . ' 网友 (' . $ip[0] . '.' . $ip[1] . '.' . $ip[2] . '.*):</span>';
			}

			echo ' ' . strip_tags($item['message']);
			
			if ($item['time'] > 0)
			{
				echo ' <span class="time">(' . Format::Date($item['time']) . ')</span>';
			}
			
			echo '</li>';
		}
	break;
	
	case 'deletereply':
		if (!$is_guest)
		{
			$reply = $db->query("SELECT * FROM reply WHERE id = " . intval($_POST['id']))->row_array();
			
			if ($reply['userid'] > 0 AND $User['id'] > 1)
			{
				echo '权限不足,操作中止.';
				exit;
			}
			
			$db->query("DELETE FROM reply WHERE id = " . intval($_POST['id']))->row_array();
			
			echo 'done';
		}
	break;
	
	case 'getplaying':
		$recent_tracks = json_decode(trim(str_replace("\'", "'", file_get_contents('music.json'))), true);
	
		if (is_array($recent_tracks['recenttracks']['track']))
		{
			if ($recent_tracks['recenttracks']['track'][0]['@attr']['nowplaying'] == 'true')
			{
				$playing = array(
					//'url' => $track['url'],
					'url' => 'http://cn.last.fm/user/' . urlencode($Own['lastfm']),
					'music' => $recent_tracks['recenttracks']['track'][0]['name'] . ' - ' . $recent_tracks['recenttracks']['track'][0]['artist']['#text']
				);
			}
		}
		
		$template = new Template('ajax_playing', NULL, NULL);
	break;
	
	case 'resetpassword':
		if ($User['id'] > 1 OR $is_guest)
		{
			exit;
		}
		
		if ($_POST['userid'] AND $_POST['md5'] == md5($_POST['userid']))
		{
			$password = rand(100000, 999999);
			
			$db->update('user', array('password' => md5($password)), array('id' => intval($_POST['userid'])));
			
			echo $password;
		}
	break;
	
	case 'swmode':
		if (Helper::GetCookie('editor_mode') == 'lite')
		{
			Helper::BakeCookie('editor_mode', 'full', time() + 24 * 3600 * 30);
		}
		else
		{
			Helper::BakeCookie('editor_mode', 'lite', time() + 24 * 3600 * 30);
		}
		
		header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
	
	case 'following':
		$entry = $db->query("SELECT * FROM entry ORDER BY time DESC LIMIT 20")->result_array();
		
		$output = array();
		
		foreach ($entry AS $key => $item)
		{
			$item['picture'] = $db->query("SELECT * FROM picture WHERE entryid = " . intval($item['id']))->row_array();
			
			if ($item['picture']['id'])
			{
				$picture = serialize(array(
					'filename' => $item['picture']['filename'],
					'o' => get_picture_url($item['picture']['id'], 'o'),
					'm' => get_picture_url($item['picture']['id'], 'm')
				));
			}
			
			$output[] = array(
				'entryid' => $item['id'],
				'message' => $item['content'],
				'time' => $item['time'],
				'from' => $item['from'],
				'picture' => $picture
			);
			
			unset($picture);
		}
		
		echo json_encode($output);
	break;
	
	case 'follow_entry_check':
		$item = $db->query("SELECT * FROM entry WHERE id = " . intval($_GET['entryid']))->row_array();
		
		if (!$item['id'])
		{
			$output = array(
				'entryid' => 'deleted'
			);
		}
		else
		{
			$item['picture'] = $db->query("SELECT * FROM picture WHERE entryid = " . intval($item['id']))->row_array();
			
			if ($item['picture']['id'])
			{
				$picture = serialize(array(
					'filename' => $item['picture']['filename'],
					'o' => get_picture_url($item['picture']['id'], 'o'),
					'm' => get_picture_url($item['picture']['id'], 'm')
				));
			}
			
			$output = array(
				'entryid' => $item['id'],
				'message' => $item['content'],
				'time' => $item['time'],
				'from' => $item['from'],
				'picture' => $picture
			);
			
			unset($picture);
		}
		
		echo json_encode($output);
	break;
	
	case 'bloginfo':
		$output = array(
			'base_url' => BASE_URL,
			'site_name' => SITE_NAME
		);
		
		echo json_encode($output);
	break;
	
	case 'load_follows':
		$follow = $db->query("SELECT * FROM followlog ORDER BY time DESC LIMIT " . Pages::GetQueryLimit(intval($_GET['page']), 20));
		
		if ($follow->num_rows() == 0)
		{
			echo json_encode('no_more');
		}
		else
		{
			$follows = $follow->result_array();
			
			foreach ($follows AS $key => $item)
			{
				$item['picture'] = unserialize($item['picture']);

				$follower = $db->query("SELECT * FROM follow WHERE id = " . intval($item['followid']))->row_array();
				
				$output = '<div class="entry"><strong><a href="' . $follower['blogurl'] . '" target="_blank">' . $follower['title'] . '</a>:</strong> <span>' . nl2br(Format::ParseBBCode($item['message'])) . '</span>';
				
				if ($item['picture']['o'])
				{
					$output .= '<p class="image"><a href="' . $item['picture']['o'] . '" title="' . $item['picture']['filename'] . '" target="pgmc_imgview"><img src="' . $item['picture']['m'] . '" alt="' . $item['picture']['filename'] .'" /></a></p>';
				}
				
				$output .= '<p style="font: 10px Arial; margin-top: 10px; text-align: right;"><span class="entry-meta" style="float:left">' . Format::Time($item['time'], 1) . ' from ' . $item['from'] . '</span><a class="permalink" href="' . $follower['blogurl'] . '?act=view&id=' . $item['entryid'] . '" target="_blank">Permalink</a></p><div class="clear"></div></div>';
				
				$json_output[] = stripslashes($output);
			}
			
			echo json_encode($json_output);
		}
	break;
	
	case 'deletefollow':
		if ($User['id'] > 1 OR !$User['id'])
		{
			Helper::PrintJavaScript("alert('权限不足,处理中止!'); window.location = '" . BASE_URL . "';");
			exit;
		}
		
		if ($_GET['id'] AND $_GET['v'] == strtoupper(md5(Format::Date(TIMENOW, 'd') . $_GET['id'])))
		{
			$db->query("DELETE FROM follow WHERE id = " . intval($_GET['id']));
			$db->query("DELETE FROM followlog WHERE followid = " . intval($_GET['id']));
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	break;
	
	case 'deleteentry':
		$entry = $db->query("SELECT * FROM entry WHERE id = " . intval($_GET['id']))->row_array();

		if (($User['id'] > 1 AND $entry['userid'] != $User['id']) OR !$User['id'])
		{
			Helper::PrintJavaScript("alert('权限不足,处理中止!'); window.location = '" . BASE_URL . "';");
			exit;
		}
		
		if ($_GET['id'] AND $_GET['v'] == strtoupper(md5(Format::Date(TIMENOW, 'd') . $_GET['id'])))
		{
			$db->query("DELETE FROM entry WHERE id = " . intval($_GET['id']));
			$db->query("DELETE FROM reply WHERE entryid = " . intval($_GET['id']));
			
			$picture = $db->query("SELECT * FROM picture WHERE entryid = " . intval($_GET['id']))->row_array();
			
			@unlink('uploads/' . gmdate('Y/m/d/', $picture['time']) . 'o_' . $item['location']);
			@unlink('uploads/' . gmdate('Y/m/d/', $picture['time']) . 'm_' . $item['location']);
			
			$db->query("DELETE FROM picture WHERE entryid = " . intval($_GET['id']));
		}
		
		redirect($_SERVER['HTTP_REFERER']);
	break;
	
	case 'quickcomment':		
		if ($_GET['message'] AND $_GET['entryid'] AND $_GET['followid'])
		{
			$follow = $db->query("SELECT id, blogurl FROM follow WHERE id = " . intval($_GET['followid']))->row_array();
			
			if (!$follow['id'])
			{
				exit;
			}
?><html><body onload="document.getElementById('sendreply').submit();"><form action="<?php echo $follow['blogurl']; ?>httprequest.php?act=sendreply" id="sendreply" method="post"><input type="hidden" name="byquick" value="TRUE"><input type="hidden" name="nickname" value="<?php echo $User['username']; ?>"><input type="hidden" name="entryid" value="<?php echo $_GET['entryid']; ?>"><input type="hidden" name="message" value="<?php echo urldecode($_GET['message']); ?>"></form></body></html>
<?php
		}
	break;
}

if (is_object($template))
{
	//eval($template->Parse());
	include $template->Parse();
}