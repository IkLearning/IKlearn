/*
Navicat MySQL Data Transfer

Source Server         : hi
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : db_banhang

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2018-01-07 12:52:32
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for chitietdondathang
-- ----------------------------
DROP TABLE IF EXISTS `chitietdondathang`;
CREATE TABLE `chitietdondathang` (
  `MaChiTietDonDatHang` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `SoLuong` int(11) DEFAULT NULL,
  `GiaBan` int(11) DEFAULT NULL,
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`MaChiTietDonDatHang`),
  KEY `FK_CTDH_DH` (`MaDonDatHang`),
  KEY `FK_CTDH_SP` (`MaSanPham`),
  CONSTRAINT `FK_CTDH_DH` FOREIGN KEY (`MaDonDatHang`) REFERENCES `dondathang` (`MaDonDatHang`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_CTDH_SP` FOREIGN KEY (`MaSanPham`) REFERENCES `sanpham` (`MaSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of chitietdondathang
-- ----------------------------
INSERT INTO `chitietdondathang` VALUES ('CTHD1', '1', '6300', 'HD1', '17');
INSERT INTO `chitietdondathang` VALUES ('CTHD2', '1', '6300', 'HD1', '16');
INSERT INTO `chitietdondathang` VALUES ('CTHD3', '1', '6300', 'HD1', '15');
INSERT INTO `chitietdondathang` VALUES ('CTHD4', '1', '6300', 'HD2', '17');
INSERT INTO `chitietdondathang` VALUES ('CTHD5', '1', '6300', 'HD2', '15');
INSERT INTO `chitietdondathang` VALUES ('CTHD6', '1', '6300', 'HD2', '16');
INSERT INTO `chitietdondathang` VALUES ('CTHD7', '1', '6300', 'HD3', '17');
INSERT INTO `chitietdondathang` VALUES ('CTHD8', '1', '6300', 'HD4', '16');

-- ----------------------------
-- Table structure for dondathang
-- ----------------------------
DROP TABLE IF EXISTS `dondathang`;
CREATE TABLE `dondathang` (
  `MaDonDatHang` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `NgayLap` datetime DEFAULT NULL,
  `TongThanhTien` int(11) DEFAULT NULL,
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `MaTinhTrang` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaDonDatHang`),
  KEY `FK_DH_TK` (`MaTaiKhoan`),
  KEY `FK_DH_TT` (`MaTinhTrang`),
  CONSTRAINT `FK_DH_TK` FOREIGN KEY (`MaTaiKhoan`) REFERENCES `taikhoan` (`MaTaiKhoan`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_DH_TT` FOREIGN KEY (`MaTinhTrang`) REFERENCES `tinhtrang` (`MaTinhTrang`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of dondathang
-- ----------------------------
INSERT INTO `dondathang` VALUES ('HD1', '2018-01-05 05:48:06', '18900', '1', '1');
INSERT INTO `dondathang` VALUES ('HD2', '2018-01-06 14:29:33', '18900', '1', '2');
INSERT INTO `dondathang` VALUES ('HD3', '2018-01-06 14:33:03', '6300', '1', '2');
INSERT INTO `dondathang` VALUES ('HD4', '2018-01-07 02:46:48', '6300', '1', '2');

-- ----------------------------
-- Table structure for hangsanxuat
-- ----------------------------
DROP TABLE IF EXISTS `hangsanxuat`;
CREATE TABLE `hangsanxuat` (
  `MaHangSanXuat` int(11) NOT NULL AUTO_INCREMENT,
  `TenHangSanXuat` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `LogoURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) NOT NULL,
  PRIMARY KEY (`MaHangSanXuat`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of hangsanxuat
-- ----------------------------
INSERT INTO `hangsanxuat` VALUES ('1', 'Riot', 'chuaco', '0');
INSERT INTO `hangsanxuat` VALUES ('2', 'Demacia', 'chuaco', '0');
INSERT INTO `hangsanxuat` VALUES ('3', 'Noxus', 'chuaco', '0');

-- ----------------------------
-- Table structure for loaisanpham
-- ----------------------------
DROP TABLE IF EXISTS `loaisanpham`;
CREATE TABLE `loaisanpham` (
  `MaLoaiSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiSanPham` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`MaLoaiSanPham`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loaisanpham
-- ----------------------------
INSERT INTO `loaisanpham` VALUES ('1', 'Đấu Sĩ', '0');
INSERT INTO `loaisanpham` VALUES ('2', 'Pháp Sư', '0');
INSERT INTO `loaisanpham` VALUES ('3', 'Xạ Thủ', '0');
INSERT INTO `loaisanpham` VALUES ('4', 'Hỗ Trợ', '0');
INSERT INTO `loaisanpham` VALUES ('5', 'Đỡ Đòn', '0');
INSERT INTO `loaisanpham` VALUES ('6', 'Sát Thủ', '0');

-- ----------------------------
-- Table structure for loaitaikhoan
-- ----------------------------
DROP TABLE IF EXISTS `loaitaikhoan`;
CREATE TABLE `loaitaikhoan` (
  `MaLoaiTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenLoaiTaiKhoan` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaLoaiTaiKhoan`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of loaitaikhoan
-- ----------------------------
INSERT INTO `loaitaikhoan` VALUES ('1', 'Admin');
INSERT INTO `loaitaikhoan` VALUES ('2', 'Employee');
INSERT INTO `loaitaikhoan` VALUES ('3', 'Guest');

-- ----------------------------
-- Table structure for sanpham
-- ----------------------------
DROP TABLE IF EXISTS `sanpham`;
CREATE TABLE `sanpham` (
  `MaSanPham` int(11) NOT NULL AUTO_INCREMENT,
  `TenSanPham` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `HinhURL` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  `GiaSanPham` int(11) DEFAULT NULL,
  `NgayNhap` datetime DEFAULT NULL,
  `SoLuongTon` int(11) DEFAULT NULL,
  `SoLuongBan` int(11) DEFAULT NULL,
  `SoLuotXem` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_unicode_ci,
  `BiXoa` tinyint(1) DEFAULT NULL,
  `MaLoaiSanPham` int(11) DEFAULT NULL,
  `MaHangSanXuat` int(11) DEFAULT NULL,
  PRIMARY KEY (`MaSanPham`),
  KEY `FK_SP_loaiSP` (`MaLoaiSanPham`),
  KEY `FK_SP_HangSX` (`MaHangSanXuat`),
  CONSTRAINT `FK_SP_HangSX` FOREIGN KEY (`MaHangSanXuat`) REFERENCES `hangsanxuat` (`MaHangSanXuat`) ON DELETE CASCADE ON UPDATE NO ACTION,
  CONSTRAINT `FK_SP_loaiSP` FOREIGN KEY (`MaLoaiSanPham`) REFERENCES `loaisanpham` (`MaLoaiSanPham`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of sanpham
-- ----------------------------
INSERT INTO `sanpham` VALUES ('1', 'Aatrox', 'aatrox.jpg', '6300', '2017-12-12 13:50:41', '100', '0', '0', '<p>Aatrox l&agrave; một chiến binh huyền thoại, một trong năm người cuối c&ograve;n lại của một tộc người cổ xưa được biết đến với c&aacute;i t&ecirc;n Darkin. Với lưỡi kiếm to bản trong tay, hắn ta c&oacute; thể ch&eacute;m n&aacute;t cả những qu&acirc;n đo&agrave;n h&ugrave;ng mạnh bằng một c&aacute;ch m&agrave; vẫn giữ được phong th&aacute;i m&ecirc; hoặc. Mỗi khi kẻ th&ugrave; nằm xuống, thanh gươm dường như c&oacute; tri gi&aacute;c của Aatrox uống m&aacute;u ch&uacute;ng, tăng cường sức mạnh cho hắn v&agrave; duy tr&igrave;nh h&agrave;nh tr&igrave;nh t&agrave;n s&aacute;t hung bạo nhưng vẫn thanh tho&aacute;t của hắn.<br /><br />Những chuyện kể đầu ti&ecirc;n về Aatrox cũng xưa cũ như những ghi ch&uacute; lịch sử đầu ti&ecirc;n. N&oacute; n&oacute;i về một cuộc chiến giữa hai phe với t&ecirc;n gọi l&agrave; Thuộc Địa v&agrave; Đại Ph&aacute;p Sư. Sau một thời gian, phe Đại Ph&aacute;p Sư li&ecirc;n tiếp c&oacute; những chiến thắng &aacute;p đảo v&agrave; tiến gần đến việc qu&eacute;t sạch đối thủ truyền kiếp một lần v&agrave; m&atilde;i m&atilde;i. Trong cuộc chạm tr&aacute;n cuối c&ugrave;ng, đội qu&acirc;n Thuộc Địa bị &aacute;p đảo về số lượng, kiệt sức v&agrave; thiếu thốn trang bị. Họ chờ đợi thất bại kh&ocirc;ng thể tr&aacute;nh khỏi.<br /><br />Khi mọi hi vọng như đ&atilde; mất đi, Aatrox xuất hiện giữa h&agrave;ng ngũ Thuộc Địa. Chỉ với v&agrave;i hiệu lệnh ngắn, hắn đốc th&uacute;c binh sĩ chiến đấu đến hơi thở cuối c&ugrave;ng trước khi tự m&igrave;nh băng v&agrave;o biển m&aacute;u. Sự hiện diện của hắn ủy lạo tinh thần những chiến binh trong bước đường c&ugrave;ng. Đầu ti&ecirc;n họ chỉ kinh ngạc đứng nh&igrave;n người h&ugrave;ng v&ocirc; danh n&agrave;y ch&eacute;m n&aacute;t đội h&igrave;nh địch, người v&agrave; kiếm như một thực thể thống nhất. Rất nhanh sau đ&oacute; nhưng chiến binh Thuộc Địa cảm thấy cơ thể tr&agrave;n ngập kh&aacute;t khao chiến đấu. Họ lao theo Aatrox, mỗi người chiến đấu với sức mạnh kinh ho&agrave;ng của mười người cho đến khi họ gi&agrave;nh thắng lợi kh&ocirc;ng tưởng.<br /><br />Aatrox biến mất sau trận chiến, nhưng cơn cuồng nộ mới được khai th&ocirc;ng của phe Thuộc Địa vẫn c&ograve;n đ&oacute;. Chiến thắng bất ngờ đ&oacute; mở đầu cho những vinh quang tiếp theo cho đến khi họ thắng lợi quay về qu&ecirc; hương. Người d&acirc;n vinh danh họ như những người anh h&ugrave;ng, nhưng họ vừa cứu cả một nền văn minh tho&aacute;t khỏi thảm họa diệt vong, b&oacute;ng tối vẫn lẩn khuất trong trong t&acirc;m tr&iacute; mỗi chiến binh. C&aacute;i g&igrave; đ&oacute; b&ecirc;n trong họ đ&atilde; thay đổi. Dần d&agrave;, k&iacute; ức chinh chiến của họ phai nhạt, chỉ c&ograve;n lại sự gi&aacute;c ngộ u uẩn: chiến c&ocirc;ng hiển h&aacute;ch của họ thực ra l&agrave; những h&agrave;nh vi t&agrave;n bạo thực hiện bởi ch&iacute;nh đ&ocirc;i tay họ.<br /><br />Những c&acirc;u chuyện như thế xuất hiện trong truyền thuyết của nhiều nền văn minh. Nếu như tất cả đều l&agrave; thật, sự hiện diện của Aatrox đ&atilde; thay đổi cục diện của một v&agrave;i cuộc chiến quan trọng nhất của lịch sử. D&ugrave; những c&acirc;u chuyện n&agrave;y ghi nhớ về hắn như một vị cứu tinh trong những thời khắc tăm tối, di sản thực sự của Aatrox c&oacute; thể l&agrave; một thế giới chất chứa chinh chiến v&agrave; hận th&ugrave;.<br /><br />\'C&oacute; kẻ chiến đấu v&igrave; danh dự, c&oacute; kẻ chiến đấu v&igrave; vinh quang. Quan trọng l&agrave; ngươi c&oacute; chiến đấu l&agrave; được rồi.\'</p>', '0', '1', '1');
INSERT INTO `sanpham` VALUES ('2', 'Ahri', 'ahri.jpg', '6300', '2017-12-12 13:58:29', '100', '0', '0', 'Không như những con hồ li khác cư ngụ trong các khu rừng phía nam Ionia, Ahri vẫn luôn cảm nhận được một mối liên kết lạ kì với thế giới ma thuật quanh cô; một mối liên kết dường như chưa hoàn thiện. Sâu thẳm bên trong, cô cho rằng hình hài hiện tại của mình hoàn toàn là một sai lầm của tạo hóa, và cô không bao giờ dừng ước mơ về một mai kia được trở thành một con người. Khát khao đó dường như chẳng bao giờ có thể trở thành hiện thực, cho đến một ngày kia cô vô tình gặp phải một cuộc chiến của loài người. Một cảnh tượng thật khủng khiếp, khắp nơi đều tràn ngập hình ảnh của những người chết hoặc trọng thương. Cô cảm thấy bị cuốn hút bởi một người - gã đàn ông mặc áo choàng đang hấp hối trong một trường ma thuật. Cô tiến lại gần và lập tức một thứ gì đó bên trong Ahri được kích hoạt, vươn tới người đàn ông theo một phương thức mà cô không tài nào hiểu nổi. Sự sống của ông ta trút dần sang người cô qua những liên kết phép thuật vô hình. Một cảm giác bao trùm và say đắm. Rồi khi cảm giác đó qua đi, cô mừng rỡ xiết bao khi nhận thấy mình đã thay đổi. Bộ lông trắng mượt của cô đã biến mất, cơ thể Ahri giờ mang dáng dấp của những thi thể đang nằm rải rác quanh đó.\r\n\r\nTuy nhiên, dù đang mang hình hài của loài người, cô biết rằng sự chuyển hóa vẫn chưa được hoàn tất. Bằng sự tinh ranh của mình, cô nhanh chóng thích nghi với xã hội loài người và tận dụng sắc đẹp của bản thân để cám dỗ những gã đàn ông ngây thơ. Với thủ đoạn đó, cô có thể hút sức sống khi họ đang bị quyến rũ. Càng ngày cô càng tiến gần đến khát khao của mình hơn, nhưng đồng thời, một cảm giác hối hận cũng trỗi dậy trong cô. Ahri đã có những cảm xúc mà lẽ ra bản thể hồ li chẳng bao giờ có. Rồi cô nhận ra mình không thể trút bỏ đi được những cảm xúc con người trong quá trình tiến hóa của bản thân. Trong hành trình tìm kiếm một giải pháp, Ahri đã đến với Viện Chiến tranh, nơi cư ngụ của những pháp sư hùng mạnh nhất Runeterra. Họ cho cô một cơ hội đạt được sự tiến hóa thành người một cách hoàn chỉnh, mà không gây hại bằng cách phục vụ trong Liên Minh Huyền Thoại.\r\n\r\n\'Nhân ái là một sự xa xỉ của nhân loại...và cũng là một trách nhiệm.\'', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('3', 'Akali', 'akali.jpg', '3150', '2017-12-12 14:13:05', '100', '0', '0', 'Có một hội kín cổ xưa khởi nguyên từ Quần đảo Ionia nguyện cống hiến hết mình nhằm duy trì sự cân bằng. Trật tự, hỗn mang, ánh sáng, bóng tối - tất cả đều phải tồn tại trong một chuẩn mực hài hòa tuyệt đối bởi đó là quy luật của vũ trụ. Trật tự này được biết đến dưới cái tên Kinkou và nó có một tam chế chiến binh bóng đêm duy trì trật tự thế giới. Akali là một trong ba, được phó thác với nhiệm vụ thiêng liêng Tỉa Cây - tiêu diệt những kẻ đe dọa sự cân bằng của Valoran.\n\nLà một thần đồng, Akali bắt đầu tập huấn với mẹ ngay khi cô biết co tay thành nắm đấm. Mẹ cô chẳng hề nương tay hay dễ dãi, theo một phương châm nghiêm khắc: \'Cái gì cần thực thi sẽ phải được thực thi.\' Khi Kinkou bổ nhiệm cô vào hội ở tuổi mười bốn, cô đã có thể chặt đứt một sợi xích chỉ bằng tay không. Chẳng nghi ngờ gì nữa - cô sẽ kế thừa danh hiệu Nắm Đấm Bóng Đêm của mẹ mình. Với vai trò này, cô đã phải thực hiện những nhiệm vụ khiến nhiều người đặt câu hỏi về mặt đạo đức của chúng, nhưng đối với cô đó là những vấn đề bất khả xâm phạm mà mẹ cô đã dạy. Giờ đây cô sánh vai cùng Shen và Kennen trong công cuộc duy trì sự cân bằng ở Valoran. Và mục đích cao cả này đã dẫn bộ ba đến với Chiến trường Công lí.\n\n\'Nắm Đấm Bóng Đêm được tung ra bởi chính Tử Thần. Chớ có cản trở sự cân bằng.\'', '0', '6', '1');
INSERT INTO `sanpham` VALUES ('4', 'Alistar', 'alistar.jpg', '6300', '2017-12-12 17:08:32', '100', '0', '2', 'Là chiến binh mạnh nhất của cả tộc Nhân Ngưu ở cùng Vách ngăn Vĩ đại, Alistar đã đánh bật tất cả những mối hiểm nguy đe dọa bộ tộc của mình; cho đến khi đội quân Noxus xuất hiện. Alistar đã bị dụ ra khỏi ngôi làng của mình bởi những mưu mô của Keiran Darkwill, con út của Baron Darkwill, và là chỉ huy của đội quân viễn chinh Noxus. Khi Alistar trở về, ngôi làng của gã đã bị thiêu rụi và gia đình của gã đã bị sát hại. Nổi cơn thịnh nộ, gã đã một mình xông vào cả quân đoàn tinh nhuệ của Noxus, hạ sát hàng trăm tên địch. Chỉ đến khi những người ưu tú nhất của Noxus xuất hiện mới cản được Alistar. Bị xích đem đến Noxus, Alistar trải qua nhiều năm làm một gã võ sĩ giác đấu kinh qua vô số những trận chiến để phục vụ cho sự giải trí của lũ cầm quyền giàu có ở Noxus. \n\nLinh hồn cao quý của Alistar dần trở nên biến chất, và gã có lẽ đã mất đi lí trí nếu không có Ayelia, một cô hầu gái trẻ tuổi đã làm bạn với gã và rồi tạo cơ hội cho gã bỏ trốn. Bỗng nhiên giành lại được tự do, Alistar đã gia nhập Liên Minh Huyền Thoại vừa được thành lập với tư cách của một vị tướng, hi vọng một ngày nào đó có thể trả được mối thù với Noxus và tìm lại cô gái đã từng cho gã hi vọng. Ban đầu Alistar vẫn còn do dự về việc tiếp nhận chức danh tướng của mình, nhưng dần dà Alistar đã phát hiện ra thứ sức mạnh ẩn chứa bên trong danh tiếng, và rồi gã đã trở thành một người bảo hộ của những kẻ không may bị chính quyền Noxus hãm hại. Đồng thời gã cũng phanh phui những điều mà quân đội Noxus muốn che dấu – nguyên nhân mà ngày càng khiến giới quý tộc Noxus căm ghét gã hơn. Những công việc từ thiện đã giúp gã giành được một số giải thưởng, tạo nên một sự mâu thuẫn oái oăm với những cơn cuồng nộ và hủy diệt hắn mang đến cho Liên Minh Huyền Thoại.\n\nNếu bạn nghĩ mình là anh hùng có thể nắm sừng bò, Alistar chắc có chuyện cần nói với bạn đấy.', '0', '5', '1');
INSERT INTO `sanpham` VALUES ('5', 'Amumu', 'amumu.jpg', '1350', '2017-12-12 17:12:09', '99', '1', '1', '<p>&ldquo;Ở một m&igrave;nh c&ograve;n c&ocirc; đơn hơn l&agrave; chết.&rdquo; Một linh hồn đơn độc v&agrave; u sầu của Shurima cổ, Amumu đi khắp thế gian t&igrave;m kiếm bạn b&egrave;. Bị một ph&eacute;p thuật cổ xưa nguyền rủa, cậu phải sống xa c&aacute;ch mọi người suốt đời, bởi ai bị cậu chạm v&agrave;o đều sẽ dần tan biến. Những kẻ từng thấy Amumu mi&ecirc;u tả cậu l&agrave; một x&aacute;c chết biết đi, nhỏ b&eacute; v&agrave; quấn đầy băng vải. Amumu l&agrave; nguồn cảm hứng cho thần thoại, truyện d&acirc;n gian, v&agrave; truyền thuyết được kể đi kể lại h&agrave;ng thế kỷ - những thứ ta kh&ocirc;ng thể ph&acirc;n biệt đ&acirc;u l&agrave; sự thật v&agrave; đ&acirc;u l&agrave; tưởng tượng.</p>', '0', '5', '1');
INSERT INTO `sanpham` VALUES ('6', 'Anivia', 'anivia.jpg', '3150', '2017-12-12 17:16:19', '100', '0', '0', 'Anivia là một thực thể của mùa đông lạnh giá nhất, một hiện thân của sức mạnh băng giá, một hộ thần cổ xưa của Freljord. Cô ta có thể điều khiển sức mạnh và sự cuồng nộ của vùng đất này, kêu gọi tuyết và những cơn gió buốt bảo vệ quê hương mình khỏi kẻ thù. Một sinh vật tốt bụng nhưng bí ẩn, sứ mệnh vĩnh hằng của Anivia là bảo vệ vùng Freljord cho dù là sống, chết hay trải qua sự tái sinh.\n\nAnivia gắn bó với Freljord như những dòng sông băng vĩnh cửu nơi này. Rất lâu trước khi con người đặt chân lên vùng lãnh nguyên khô cằn của nơi này, cô ta đã trải qua vô vàn vòng đời và vô số cái chết. Sự khởi đầu và kết thúc của vòng đời vĩnh cửu đó luôn báo hiệu những thay đổi to lớn, từ những cơn bão lớn cho đến những kỉ băng hà. Người ta nói rằng khi phượng hoàng băng chết đi, kỉ nguyên sẽ kết thúc; và khi nó tái sinh, một kỉ nguyên mới sẽ bắt đầu.\n\nDù cho những cuộc sống cũ của Anivia đã phai nhạt trong trí nhớ của cô, Anivia vẫn nhớ nhiệm vụ của mình: bảo vệ Freljord bằng mọi giá.\n\nLần cuối cùng cô hồi sinh, Anivia được chứng kiến sự trỗi dậy của một bộ tộc hùng mạnh và đoàn kết. Cô bảo vệ lãnh thổ của họ với lòng tự hào trong khi họ ngày càng phát triển, nhưng sự gắn kết như thế không thể tồn tại mãi mãi. Bộ tộc vĩ đại đó tách ra thành 3 nhóm, và sau sự kiện đó, Anivia chứng kiến người dân Freljord chìm trong những cuộc chiến. Trong khi cố gắng dẹp yên sự hỗn loạn đang phá hủy quê hương mình, Anivia bắt đầu nhận thấy một mối đe dọa lớn hơn: một loài ác quỷ cổ xưa đang trỗi dậy từ sâu trong lòng đất. Cô cảm thấy ma pháp băng giá trở nên đen tối và tha hóa, và điều này khiến Anivia kinh hoàng. Cũng giống như máu loang ra trong nước, bóng tối từ từ xâm chiếm Freljord. Với sứ mệnh của mình gắn chặt với sức mạnh của vùng đất này, Anivia biết rằng nếu thứ xấu xa quỷ quái này chiếm được Freljord, cô cũng sẽ bị tha hóa. Cô không thể chỉ là một vệ thần được nữa – phượng hoàng băng phải ra tay.\n\nAnivia sớm tìm được một đồng minh, Ashe – Xạ Thủ Băng Giá. Ashe cũng tin rằng sự thống nhất là cách ngăn chặn sự diệt vong của Freljord, và Anivia đề nghị được giúp đỡ cô. Giờ đây khi chiến tranh đang thấp thoáng nơi chân trời, Anivia chuẩn bị để chiến đấu vì hòa bình, nhưng cô biết một sự thật không thể tránh khỏi của số phận mình. Một ngày nào đó, cái ác sẽ trỗi dậy từ băng giá, và cô phải hủy diệt nó – bằng bất cứ giá nào.\n\n“Ta là cơn thịnh nộ của bão tuyết, là nhát cắt của cơn gió rét, là cái lạnh của băng giá. Ta là Freljord.\' ', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('7', 'Annie', 'annie.jpg', '450', '2017-12-12 17:20:27', '100', '0', '0', 'Luôn có những người trong thành bang tội lỗi Noxus không đồng tình với những hành vi đen tối của Hội Đồng Tối Cao Noxus. Hội Đồng này vừa dập tắt một vụ đảo chính của vị hoàng tử tự phong Raschallion, và ra tay trừng phạt tất cả các ý định chống phá chính quyền mới. Những kẻ bị gạt ra ngoài lề chính trị và xã hội này - còn được biết đến dưới cái tên Hội Xám - đã quyết định rời đi trong hòa bình để theo đuổi những tri thức cổ học tăm tối.\n\nLãnh tụ của tầng lớp bị ruồng bỏ này là một cặp vợ chồng: Gregori Hastur - Pháp sư Xám, và vợ hắn Amoline - Phủ thủy Hắc ám. Cùng nhau, họ dẫn dắt một cuộc di cư của những pháp sư và trí thức rời Noxus, tái lập cuộc sống ở phía bên kia Vách ngăn Vĩ đại về phía bắc, tới Vùng Đất Tà Thuật khắc nghiệt. Dẫu cuộc sống khó khăn đầy thử thách, Hội Xám vẫn tồn tại được ở nơi mà rất nhiều kẻ khác đã phải bỏ mạng.\n\nNhiều năm sau cuộc di cư, Gregori và Amoline hạ sinh một đứa trẻ: Annie. Ngay từ đầu, cha mẹ Annie đã biết có điều gì đó đặc biệt về đứa con gái của họ. Mới lên hai, cô bé đã có thể thuần phục một con gấu bóng đêm - một sinh vật hung tợn của khu rừng hóa đá bên ngoài lãnh thổ - và biến nó thành thú cưng của mình. Cho đến giờ cô vẫn giữ chú gấu \'Tibbers\' bên mình, cô thường hay dùng phép biến nó thành một con thú nhồi bông để đem theo như đồ chơi trẻ con. Sự kết hợp dòng máu ma thuật của cha mẹ Annie và phép thuật bóng tối nơi cô sinh ra đã trao cho đứa trẻ này một sức mạnh huyền bí khủng khiếp.  ', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('8', 'Ashe', 'ashe.jpg', '450', '2017-12-12 17:22:31', '100', '0', '0', '<p>Mỗi mũi tên bắn ra từ cây cung băng phép cổ xưa của cô đều thể hiện rằng Ashe là một thiện xạ đại tài. Cô chọn lựa mục tiêu kĩ lưỡng, chờ đợi khoảnh khắc thích hợp rồi buông tên với sức mạnh và sự chính xác. Cũng với tầm nhìn và sự tập trung đó, cô theo đuổi mục tiêu thống nhất các bộ tộc vùng Freljord để tạo nên một quốc gia hùng mạnh.\n\nKhi còn bé, Ashe đã hay mơ mộng. Cô mê mẩn trước những thành trì to lớn bị bỏ hoang của tổ tiên mình, dành hàng giờ bên bếp lửa để ngồi nghe về những anh hùng trong truyền thuyết của Freljord. Trong số đó Ashe yêu thích nhất là Avarosa, vị nữ hoàng của một Freljord một thời lừng lẫy và nhất thống. Dù bị mẹ mắng vì sự ngây ngô của mình, Ashe vẫn đinh ninh rằng một ngày nào đó cô sẽ sát nhập tất cả những bộ tộc hiếu chiến rải rác khắp vùng lãnh nguyên. Cô biết rõ rằng nếu người dân Freljord có thể cùng hướng về một mục đích một lần nữa, họ sẽ trở nên vĩ đại như thuở xa xưa.\n\nKhi Ashe mới mười lăm tuổi, mẹ cô bị sát hại khi đang dẫn đầu bộ tộc trong một trận chiến. Bất ngờ phải nhận vị trí lãnh đạo, Ashe phải đưa ra một lựa chọn khó khăn để theo đuổi giấc mơ thơ ấu thay vì trả thù cho mẹ. Cô mạnh mẽ phản đối yêu cầu báo thù của bộ tộc mình, tuyên bố rằng đây là thời điểm để dẹp bỏ thù hận và hướng tới hòa bình. Một vài binh sĩ nghi ngờ khả năng lãnh đạo của cô và tiến hành những âm mưu loại trừ vị tộc trưởng trẻ tuổi.\n\nNhững kẻ ám sát ra tay khi Ashe đang đi săn, nhưng kế hoạch của chúng bị chặn đứng bởi tiếng kêu cảnh báo của một con diều hâu to lớn. Ashe quay lại và thấy quân lính mình đang tiến tới với gươm tuốt trần. Không thể chống lại số đông, Ashe phải bỏ chạy hàng giờ liền. Cô thấy mình đang ở một khu vực chưa ai biết đến, vũ khí đã mất khi trốn chạy. Khi nghe thấy một tiếng kêu khác của con diều hâu, Ashe đặt niềm tin vào sinh vật đó và theo nó đến một khoảnh đất trống. Ở đó cô thấy nó đang đậu trên một đống đá – một ngôi mộ Freljord cổ xưa. Sau khi nhìn cô lần cuối, con diều hâu rít lên và bay đi. Tiến lại đống đá, cô thấy hơi thở mình biến thành sương giá và cảm thấy một cái lạnh bất thường thấu tận xương. Viên đá trên đỉnh ngôi mộ chỉ có một chữ cổ ngữ duy nhất: Avarosa.\n\nNhững kẻ truy sát xông tới. Ashe nhặt viên đá cổ ngữ lên để tự vệ làm lộ ra thứ gì đó ẩn giấu bên dưới: một cây cung tuyệt đẹp tạc từ băng. Cô nhặt nó lên để rồi thốt lên đau đớn khi sương giá bao phủ ngón tay cô, rồi cô nhấc nó lên khỏi ngôi mộ. Hơi lạnh tràn từ thứ vũ khí ma pháp sang Ashe, đánh thức một sức mạnh mãnh liệt trong cơ thể cô.\n\nAshe quay lại đối mặt với bọn sát thủ. Cô giương cung lên, và chỉ với bản năng của mình, những mũi tên băng hiện ra từ không khí lạnh buốt. Chỉ với một lần buông tên, cô hạ gục tất cả kẻ thù. Sau khi cẩn thận đặt viên đá lại, Ashe cảm ơn Avarosa rồi về nhà. Bộ tộc của Ashe ngay lập tức nhận ra thứ vũ khí huyền thoại trên tay cô là một lời chúc phúc từ nữ hoàng cổ xưa Freljord.\n\nVới cây cung của Avarosa và khát khao thống nhất trong hòa bình, bộ tộc của Ashe ngày càng mạnh mẽ, trở thành bộ tộc lớn mạnh nhất của Freljord. Giờ đây với cái tên tộc Avarosa, họ tin tưởng tuyệt đối rằng một ngày kia một Freljord nhất thống sẽ một lần nữa trở thành một quốc gia vĩ đại.\n\n\'Một bộ tộc, một dân tộc, một Freljord.\'</p>', '0', '3', '1');
INSERT INTO `sanpham` VALUES ('9', 'Aurelion Sol', 'AurelionSol.jpg', '6300', '2017-12-13 04:53:30', '100', '0', '0', '<p>Aurelion Sol đã từng ngự ở những khoảng không vô tận của vũ trụ với những kỳ quan thiên hà do chính hắn tạo ra. Giờ đây, hắn buộc phải sử dụng sức mạnh thần thánh của mình theo lệnh của một vương quốc xuyên vũ trụ, đã lừa hắn phải phục vụ họ. Mong muốn được trở về với con đường luyện sao của mình, Aurelion Sol sẽ lôi hết những vì sao xuống khỏi bầu trời, nếu điều đó là cần thiết, để giành lại tự do cho mình.</p>', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('10', 'Azir', 'azir.jpg', '6300', '2017-12-13 04:54:43', '100', '0', '0', '<p>“Shurima từng là ánh hào quang của Runeterra. Ta sẽ tái hiện lại nó.”\n\nAzir là hoàng đế của Shurima từ một thời đại xa xăm, một kẻ kiêu hãnh đứng trên đỉnh của sự bất tử. Thói ngạo mạn đã khiến ngài bị phản bội và sát hại đúng thời khắc đắc tngàig nhất, nhưng giờ, hàng thiên niên kỷ sau, ngài đã tái sinh thành Thể Thăng Hoa đầy sức mạnh. Khi thành phố bị chôn vùi trỗi dậy từ lòng cát, Azir tìm cách phục hồi Shurima hưng thịnh trước đây.</p>', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('11', 'Bard', 'bard.jpg', '6300', '2017-12-13 14:37:04', '100', '0', '0', '<p>Những thế giới Bard đã viếng thăm hoàn toàn vượt xa tất cả những gì người trần mắt thịt có thể tưởng tượng được. Một số những học giả vĩ đại nhất trên khắp Valoran đã dùng cả đời mình hòng thấu hiểu những huyền bí ẩn sau sự hiện diện của ông. Xuyên suốt dòng lịch sử của Valoran đã có rất nhiều biệt danh được đặt ra cho sinh linh thể bí ẩn này, chẳng hạn như Vệ Thần Lãng Du hay Ông Bụt Vũ Trụ, thế nhưng chẳng cái tên nào có đủ khả năng diễn đạt được mục đích chân chính của ông cả. Bất cứ khi nào vũ trụ bị đe dọa, Bard sẽ xuất hiện để cứu rỗi.</p>', '0', '4', '1');
INSERT INTO `sanpham` VALUES ('12', 'Blitzcrank', 'Blitzcrank.jpg', '6300', '2017-12-13 14:45:56', '100', '0', '1', '<p>Th&agrave;nh phố Zaun l&agrave; một nơi m&agrave; cả ph&eacute;p thuật lẫn khoa học đều đi chệch hướng, v&agrave; đặc t&iacute;nh kh&ocirc;ng thể kiểm so&aacute;t của những th&iacute; nghiệm đ&atilde; g&acirc;y tổn hại kh&ocirc;ng &iacute;t cho th&agrave;nh phố. Tuy nhi&ecirc;n, c&aacute;c luật lệ khoan dung của Zaun đ&atilde; tạo điều kiện cho c&aacute;c nh&agrave; khoa học v&agrave; s&aacute;ng chế tiến bộ một c&aacute;ch thần tốc, dẫu chẳng r&otilde; tốt hay xấu. Nhờ đ&oacute; m&agrave; một nh&oacute;m thực tập sinh của Học Viện Ma Kĩ của Zaun đ&atilde; ph&aacute; vỡ được giới hạn về tr&iacute; th&ocirc;ng minh của m&aacute;y hơi nước tự động. T&aacute;c phẩm của họ - g&atilde; khổng lồ hơi nước Blitzcrank - được ph&aacute;t triển để hỗ trợ gi&aacute;m s&aacute;t qu&aacute; tr&igrave;nh t&aacute;i tạo h&oacute;a chất độc hại của Zaun, do c&aacute;c điều kiện nơi đ&oacute; kh&ocirc;ng ph&ugrave; hợp với con người. Tuy nhi&ecirc;n, t&ecirc;n khổng lồ bắt đầu c&oacute; những h&agrave;nh động kh&ocirc;ng lường trước được. Thời gian tr&ocirc;i qua, c&aacute;c khoa học gia đ&atilde; c&oacute; thể x&aacute;c minh được đ&oacute; l&agrave; một qu&aacute; tr&igrave;nh học hỏi, v&agrave; Blitzcrank nhanh ch&oacute;ng trở n&ecirc;n nổi tiếng. Tuy nhi&ecirc;n, cũng như mọi trường hợp kh&aacute;c, vinh quang cho việc tạo ra người m&aacute;y n&agrave;y đ&atilde; bị chiếm đoạt bởi gi&aacute;o sư Stanwick Pididly. D&ugrave; vậy giờ đ&acirc;y mọi người đều đ&atilde; biết sự thật. Cuộc tranh gi&agrave;nh ph&aacute;p l&yacute; nổ ra, nhưng r&otilde; r&agrave;ng l&agrave; cả hai b&ecirc;n đều chẳng thật sự quan t&acirc;m về nguyện vọng của g&atilde; khổng lồ, v&agrave; Blitzcrank đ&atilde; thỉnh cầu được sự tự do cho bản th&acirc;n. Được sự ủng hộ bởi c&ocirc;ng ch&uacute;ng, Li&ecirc;n Minh Zaun chỉ mất v&agrave;i tuần đ&atilde; c&ocirc;ng bố Blitzcrank l&agrave; một người m&aacute;y c&oacute; tri thức, độc lập. L&agrave; một thực thể độc đ&aacute;o, người m&aacute;y hơi nước n&agrave;y đ&atilde; rời khỏi Zaun, ch&aacute;n nản bởi những cuộc đấu đ&aacute; v&ocirc; vị v&agrave; cảm gi&aacute;c lạc l&otilde;ng giữa d&ograve;ng đời. Giờ hắn t&igrave;m khắp Valoran để kiếm được một nơi hắn sẽ thuộc về. Dẫu Blitzcrank chẳng nương tay với kẻ n&agrave;o ng&aacute;ng đường, hắn thực sự c&oacute; một tr&aacute;i tim bằng v&agrave;ng... bao bọc bởi một chiếc khung sắt... lồng trong một bộ gi&aacute;p th&eacute;p.</p>', '0', '4', '1');
INSERT INTO `sanpham` VALUES ('13', 'Brand', 'brand.jpg', '6300', '2017-12-13 14:47:30', '100', '0', '0', '<p>Ở một phương trời xa xôi gọi là Lokfar có một gã cướp biển tên Kegan Rodhe. Theo truyền thống của tổ tiên, Kegan cùng với lũ bạn đồng hành giong buồm tiến biển khơi, cướp bóc kho báu của những kẻ chẳng may bị chúng phát hiện. Với vài người, hắn là một con quái vật, với những kẻ khác, hắn cũng chỉ là một con người. Một đêm nọ, khi đang băng qua những con nước cực bắc, những thứ ánh sáng kỳ lạ từ đâu xuất hiện nhảy múa trên vùng hoang mạc băng giá. Có một điều gì đó thật mê hoặc, cứ như thể họ bị cuốn đến với những ngọn lửa đó như những con thiêu thân. Băng qua vùng đất giá lạnh, họ tìm thấy một cái hang bao phủ đầy những thứ cổ ngữ. Dĩ nhiên họ chẳng hiểu gì cả, Kegan dẫn đầu đoàn người tiến vào bên trong. Ở đáy động tồn tại một cột lửa đang nhảy múa bên trong một cái lồng băng giá cực kỳ kiên cố. Chẳng có thứ gì lại bùng cháy như thế, nhất là ở nơi này. Dẫu vậy, những bước nhảy của nó cứ sống động và linh hoạt đến lạ kỳ, đầy mê hoặc và cám dỗ như một bài ca tiên cá. Tất cả đều lui lại, duy chỉ có Kegan là khô<p>ng thể kiềm chế được bản thân, và rồi hắn chìa tay về phía trước...\n\nĐó là điều cuối cùng Kegan Rodhe có thể nhớ, vì giờ đây thân thể của hắn đã thuộc về Brand - một sinh vật thời thượng cổ. Biết đâu đấy, thậm chí hắn có thể là một nạn nhân của những cuộc Chiến Tranh Cổ Ngữ. Trong những văn bản cổ xưa, hắn được biết đến dưới cái tên Ngọn Lửa Phục Hận. Một sinh vật chỉ có căm thù và căm thù, tồn tại vì một lý do duy nhất: tàn phá cả thế giới của loài người lẫn tộc yordle. Không ai rõ làm cách nào Brand đến được Valoran, nhưng hắn đã bắt đầu những chuyến đi săn của mình ngay lập tức. Bị khuất phục bởi quân đội Demacia, hắn chẳng còn lựa chọn nào khác: chiến đấu dưới sự kiểm soát của Liên Minh hoặc chết. Đương nhiên, hắn chọn cách được sử dụng sức mạnh tàn phá của mình trong Liên Minh, tạm thời là vậy...\n\n\'Chốn này sẽ bùng cháy, không phải bởi tàn lửa hay thổi bùng bởi gió, mà do chính bàn tay căm hờn của ta.\'</p>', '0', '2', '1');
INSERT INTO `sanpham` VALUES ('14', 'Braum', 'braum.jpg', '6300', '2017-12-13 17:00:45', '100', '0', '0', '<p>\'\'Cháu bà có muốn nghe chuyện cổ tích không nào?\'\'\r\n\r\n\'\'Bà ơi, cháu lớn rồi mà.\'\'\r\n\r\n\'\'Đâu có luật nào cấm trẻ lớn nghe chuyện cổ tích phải không nào.\'\'\r\n\r\nCô bé miễn cưỡng bò lên giường rồi chờ đợi, biết chắc mẩm rằng chẳng thể nào nói lại bà mình cả. Một luồng gió bên ngoài rít lên từng hồi, cuốn các bông hoa tuyết vào những cơn gió xoáy bất tận.\r\n\r\n\'\'Chuyện gì giờ nhỉ? À, chuyện về Mụ Phù Thủy Băng nhé?\'\' người bà hỏi.\r\n\r\n\'\'Eo ôi, không nghe chuyện về mụ ấy đâu ạ.\'\'\r\n\r\n\'\'Thế chuyện về chàng Braum nhé?\'\' Đáp lại câu hỏi của người bà là một sự im lặng. Người bà mỉm cười. \'\'Chuyện về chàng dũng sĩ này thì kể hoài không hết. Hồi xưa bà của bà vẫn hay kể về cái dạo mà Braum đã bảo vệ làng ta khỏi nanh vuốt của loài rồng ra sao! Không thì – cũng rất lâu về trước rồi – chuyện chàng ta đã chạy thẳng một mạch xuống nguyên cả một dòng sông dung nham thế nào! Hoặc –\'\' Bà dừng lại trong thoáng chốc, đặt một ngón tay lên môi mình. \'\'Bà đã kể cháu nghe chuyện làm sao mà chàng Braum sở hữu chiếc khiên của mình chưa ấy nhỉ?\'\'\r\n\r\nCô bé lắc đầu lia lịa. Ngọn lửa trong lò sưởi nhảy chồm lên, táp thẳng vào lũ gió lạnh.\r\n\r\n\'\'Ngày xửa ngày xưa, trên những dãy núi cao của làng ta có một chàng trai tên là Braum -\'\'\r\n\r\n\'\'Đoạn này nghe mãi rồi bà ơi!\'\' \r\n\r\n\'\'Chàng ta quanh năm suốt tháng không làm nông, thì cũng chỉ trông nom lũ cừu và dê của mình với một nụ cười tươi rói làm ấm lòng người luôn nở trên môi. Đó là một chàng trai tốt bụng nhất trần đời.\r\n\r\n\'\'Rồi vào một ngày kia đã xảy ra một chuyện vô cùng kinh khủng: một cậu bé sơn tinh, cỡ tầm tuổi cháu ấy – đang leo núi thì vô tình tìm thấy một hầm mộ chôn sâu trong lớp núi đá. Đường vào hầm mộ thì bị một cánh cửa đá to bản với một mảnh Băng Vĩnh Cửu đính ngay tâm chặn đi mất. Tò mò, cậu sơn tinh nọ đã mở cánh cửa ấy ra, và chao ôi, thật khó mà có thể tin nổi, bên trong là một cơ mang đầy những vàng, bạc, và châu báu óng ánh lấp lánh – tất cả những gì mà cháu có thể tưởng tượng ra ấy!\r\n\r\n\'\'Thế nhưng, cậu bé nào có ngờ rằng hầm mộ ấy thật ra là một cái bẫy. Mụ Phù Thủy Băng đã nguyền rủa nó – và ngay khi cậu bé bước vào thì cánh cửa ma thuật đó liền đóng SẬP lại và nhốt cậu ta bên trong! Dù đã cố làm đủ mọi cách, nhưng rồi cậu bé cũng đành phải đầu hàng trước cánh cửa.\r\n\r\n\'\'May mắn thay một người chăn cừu đi ngang đó đã nghe được tiếng cầu cứu của cậu bé. Tất cả mọi người đều chạy vội tới để tìm cách giúp đỡ, nhưng ngay cả những chiến sĩ hùng mạnh nhất cũng đều phải đầu hàng trước cánh cửa. Cha mẹ của cậu bé phải cố dìu nhau để cùng đứng vững, và tiếng khóc nỉ non của người mẹ cứ vang vọng mãi khắp các dãy núi. Thật tuyệt vọng.\r\n\r\n\'\'\'Và rồi, trước sự kinh ngạc của mọi người, họ nghe được một tiếng cười vang vọng chốn xa xăm.\'\'\r\n\r\n\'\'Chắc hẳn là Braum rồi!\'\r\n\r\n\'\'Cháu của bà thông minh phết nhờ! Braum đã nghe được tiếng gào khóc của họ nên liền trượt thẳng xuống vách núi. Dân làng xúm lại kể cho chàng ta nghe về cậu bé sơn tinh và lời nguyền rủa. Braum mỉm cười, gật đầu, rồi tiến lại chỗ hầm mộ. Chàng đẩy nó. Kéo nó; đá nó; cố giật bản lề nó ra, nhưng tất cả chỉ là dã tràng xe cát biển đông mà thôi.\'\'\r\n\r\n\'\'Nhưng chàng là người khỏe nhất cơ mà!\'\'\r\n\r\n\'\'Cái đấy thì dĩ nhiên rồi cháu ạ,\'\' người bà gật đầu. \'\'Suốt bốn ngày bốn đêm, Braum ngồi trên một tảng đá, cố tìm ra giải pháp. Mạng sống của cậu bé đang trôi dần đi theo thời gian.\r\n\r\n<p>\'\'Và rồi, khi bình minh ngày thứ năm xuất hiện, đôi mắt chàng ta liền bừng sáng, và nụ cười toe toét lại nở trên môi. Tuy ta không thể phá nổi cánh cửa,\' chàng lên tiếng, nhưng ta vẫn có thể phá nổi –\'\'\r\n\r\nCô bé suy nghĩ trong chốc lát; rồi tròn mắt thốt lên.\'\'- ngọn núi!\'\'\r\n\r\n\'\'Ngọn núi. Braum nói là làm, chàng liền đi tới đỉnh núi rồi bắt đầu vung tay đấm mạnh xuống, đào xuyên từ lớp đá này đến lớp đá nọ, hết cú đấm này tới cú đấm kia, đất đá văng lên tưởng chừng như liên miên bất tận, rồi dần dần chàng biến mất cứ như thể đã bị ngọn núi nuốt chửng vậy.\r\n\r\n\'\'Trước sự hồi hộp của dân làng, cánh cửa rung lên từng hồi – và khi lớp bụi mù tan đi, họ thấy Braum đứng đó giữa đống châu báu, với cậu bé sơn tinh yếu ớt nhưng đầy vui mừng trên tay.\'\'\r\n\r\n\'\'Cháu biết ngay mà!\'\'\r\n\r\n\'\'Nhưng trước khi họ kịp ăn mừng, ngọn núi rung lên từng hồi: đường hầm Braum đào ra đã phá vỡ kết cấu của ngọn núi, và giờ thì nó sắp sụp đến nơi rồi! Lập tức Braum chộp lấy cánh cửa ma thuật rồi giơ nó lên như một chiếc khiên, bảo vệ tất cả mọi người trước cơn thịnh nộ của ngọn núi. Và khi tất cả kết thúc, trước sự kinh ngạc của Braum; chẳng hề có, dù chỉ là một, vết trầy nào trên cánh cửa cả! Braum đoán nó hẳn phải là một thứ bảo bối.\r\n\r\n\'\'Và từ đó trở đi, chiếc khiên ma thuật đó chẳng bao giờ rời tay Braum cả.\'\'\r\n\r\nCô bé ngồi thẳng dậy, cố gắng không biểu lộ sự háo hức của mình. Người bà chờ trong một thoáng, rồi nhún vai chuẩn bị đứng dậy.\r\n\r\n\'\'Bà ơi,\'\' cô bé níu lại \'\'bà kể tiếp một chuyện nữa nhé?\'\'\r\n\r\n\'\'Ngày mai nhé.\'\' Người bà mỉm cười; hôn lên trán của cháu mình rồi thổi tắt nến. \'\'Cháu phải đi ngủ cái đã, chuyện thì chẳng bao giờ hết đâu.\'\'</p>', '0', '5', '1');
INSERT INTO `sanpham` VALUES ('15', 'Caitlyn', 'caitlyn.jpg', '6300', '2017-12-13 17:20:07', '100', '0', '0', '<p>\'\'Đấy, cứ chạy đi. Chấp các ngươi trước 5 phút đó.\'\'\r\n\r\nMột trong những nguyên nhân khiến Piltover được biết đến với danh hiệu Thành Phố Tân Tiến là vì tỉ lệ tội phạm cực thấp. Nhưng trước đây mọi sự không được như vậy; các thể loại côn đồ trộm cướp đã từng xem chốn thành thị nơi đây là một chốn thiên đường trần thế, chủ yếu là dựa vào các nguồn tài nguyên cứ liên tục được đổ về cho các dự án nghiên cứu khoa ma pháp. Một số còn thậm chí cho rằng nếu không có Caitlyn - cảnh sát trưởng của Piltover, thì nơi đây đã trở thành một vùng hỗn loạn của lũ tội phạm có tổ chức.\r\n\r\nCha là một chính khách giàu có, mẹ là một nhà nghiên cứu tiên phong, Caitlyn nhanh chóng bộc lộ tài năng điều tra trời phú của mình. Ở tuổi 14, cha của cô bị tấn công và cướp khi đang trên đường về nhà. Cô bé lẻn ra khỏi nhà với khẩu súng trường của cha mình rồi lần theo dấu vết của tên cướp từ hiện trường vụ án. Đương nhiên, ban đầu cha mẹ cô bé đều muốn con mình tránh xa ra khỏi thứ \'\'thú vui\'\' nguy hiểm này, nhưng cô bé đời nào vâng lời. Mẹ cô buộc phải bảo vệ con mình theo cách duy nhất bà biết, trang bị hàng tá các thiết bị khoa ma kĩ để phục vụ cho nhu cầu trinh thám của cô.\r\n\r\nCaitlyn nhanh chóng nổi danh, cả vì tài năng bắt cướp của mình lẫn vẻ mĩ miều của một cô gái tuổi mới lớn. Cô chẳng bao giờ đầu hàng trước một vụ án hay thử thách nào cả, và cô cũng là một trong những tay súng cự phách nhất thành phố. Demacia nhanh chóng viện đến sự hỗ trợ của cô để giúp phá các vụ án gây ra bởi những tên ngoại bang khét tiếng.\r\n\r\n<p>Tên cướp luôn để lại đằng sau một lá bài với chữ \'C\' hoa mĩ tại hiện trường vụ án, đã trở thành kẻ thù không đội trời chung của Caitlyn. Đến tận ngày nay, Caitlyn vẫn còn đang truy tìm tên cướp tinh quái này, và cuộc truy đuổi đã dẫn cô đi khắp Valoran. Cô đã tham gia Liên Minh để trui rèn kĩ năng của mình, đồng thời tiếp nhận những thứ quyền lực cần thiết để tìm ra kẻ duy nhất thoát khỏi bàn tay của cô.</p>', '0', '3', '1');
INSERT INTO `sanpham` VALUES ('16', 'Camille', 'camille.jpg', '6300', '2017-12-13 17:39:49', '93', '7', '0', '<p>Được vũ trang để h&agrave;nh &aacute;n b&ecirc;n ngo&agrave;i ranh giới luật ph&aacute;p, Camille l&agrave; điệp vi&ecirc;n tinh nhuệ đảm bảo cho cỗ m&aacute;y Piltover v&agrave; khu Zaun b&ecirc;n dưới hoạt động trơn tru. Trưởng th&agrave;nh giữa gia quy v&agrave; tiền bạc, c&ocirc; l&agrave; Đội Trưởng T&igrave;nh B&aacute;o của Nh&agrave; Ferros, nhận tr&aacute;ch nhiệm giải quyết những sự vụ hắc &aacute;m với độ ch&iacute;nh x&aacute;c của một b&aacute;c sĩ phẫu thuật. Những kẻ kh&aacute;c ở Piltover c&oacute; thể sở hữu n&acirc;ng cấp Hextech, nhưng l&ograve;ng tận t&acirc;m của Camille với c&ocirc;ng việc khiến nhiều kẻ thắc mắc liệu phần m&aacute;y trong c&ocirc; c&oacute; nhiều hơn phần người kh&ocirc;ng. Sở hữu tr&iacute; tuệ cũng sắc b&eacute;n như lưỡi dao c&ocirc; sử dụng, Camille ki&ecirc;n nhẫn v&agrave; dễ d&agrave;ng th&iacute;ch nghi, nhưng c&ocirc; xem c&aacute;c c&ocirc;ng nghệ vụng về v&agrave; hỗn độn l&agrave; thứ cần phải đặt lại đ&uacute;ng chỗ.</p>', '0', '1', '1');
INSERT INTO `sanpham` VALUES ('17', 'Cassiopeia', 'cassiopeia.jpg', '6300', '2017-12-13 17:45:11', '94', '6', '3', '<p>Cassiopeia l&agrave; một sinh vật khủng khiếp - nửa người, nửa rắn - kẻ m&agrave; c&oacute; thể ti&ecirc;u diệt bất cứ ai chỉ bằng một c&aacute;i liếc nh&igrave;n. L&agrave; tiểu thư &uacute;t của d&ograve;ng tộc c&oacute; sức ảnh hưởng mạnh nhất ở Noxus, c&ocirc; ta kh&ocirc;ng chỉ xinh đẹp m&agrave; c&ograve;n kh&ocirc;n ngoan đến xảo quyệt với khả năng l&agrave;m xi&ecirc;u l&ograve;ng người của m&igrave;nh. Dẫu bị biến h&oacute;a bởi nọc độc của một lo&agrave;i canh g&aacute;c cổ mộ Shurima, c&ocirc; ta vẫn tiếp tục phục vụ giới chức quyền Noxus... chỉ l&agrave; bằng những c&aacute;ch đa dạng hơn.</p>', '0', '2', '1');

-- ----------------------------
-- Table structure for taikhoan
-- ----------------------------
DROP TABLE IF EXISTS `taikhoan`;
CREATE TABLE `taikhoan` (
  `MaTaiKhoan` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `MatKhau` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `TenHienThi` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `NgaySinh` date DEFAULT NULL,
  `DiaChi` varchar(256) COLLATE utf8_unicode_ci DEFAULT NULL,
  `DienThoai` varchar(11) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Email` varchar(30) COLLATE utf8_unicode_ci DEFAULT NULL,
  `BiXoa` tinyint(1) DEFAULT NULL,
  `MaLoaiTaiKhoan` int(11) NOT NULL DEFAULT '3',
  PRIMARY KEY (`MaTaiKhoan`),
  KEY `FK_TK_LoaiTK` (`MaLoaiTaiKhoan`),
  CONSTRAINT `FK_TK_LoaiTK` FOREIGN KEY (`MaLoaiTaiKhoan`) REFERENCES `loaitaikhoan` (`MaLoaiTaiKhoan`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of taikhoan
-- ----------------------------
INSERT INTO `taikhoan` VALUES ('1', 'admin', '4297f44b13955235245b2497399d7a93', 'Lê Ngọc Nam', '1997-03-11', 'Q9', '934110397', 'kugack@gmail.com', '0', '1');
INSERT INTO `taikhoan` VALUES ('2', 'lam113', '4297f44b13955235245b2497399d7a93', 'Tăng Trường Lâm', null, 'Q9', '01687778705', 'lam@gmail.com', '0', '1');
INSERT INTO `taikhoan` VALUES ('3', 'loc113', '4297f44b13955235245b2497399d7a93', 'Huỳnh Anh Thêm Lộc', null, 'Bình Chánh', '0976899772', 'lochuynh@gmail.com', '0', '1');
INSERT INTO `taikhoan` VALUES ('4', 'Nam113', '4297f44b13955235245b2497399d7a93', 'Lê Ngọc Nam', '2018-01-31', 'Q9', '934110397', 'kugack@gmail.com', '0', '3');
INSERT INTO `taikhoan` VALUES ('5', '12312311', '4297f44b13955235245b2497399d7a93', '123123', '2018-01-14', '123123', '132123', '123123', '0', '3');

-- ----------------------------
-- Table structure for tinhtrang
-- ----------------------------
DROP TABLE IF EXISTS `tinhtrang`;
CREATE TABLE `tinhtrang` (
  `MaTinhTrang` int(11) NOT NULL AUTO_INCREMENT,
  `TenTinhTrang` varchar(45) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`MaTinhTrang`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of tinhtrang
-- ----------------------------
INSERT INTO `tinhtrang` VALUES ('1', 'Đã xử lý');
INSERT INTO `tinhtrang` VALUES ('2', 'Đang xử lý');
INSERT INTO `tinhtrang` VALUES ('3', 'Chưa xử lý');
