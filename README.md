<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>
# Mô tả project
Các chức năng chính của hệ thống:<br>
*Quản lý người dùng:<br>
Hệ thống cho phép khởi tạo và lƣu trữ thông tin ngƣời dùng gồm cán bộ là
trƣởng bộ môn, giảng viên và sinh viên. Mỗi ngƣời dùng sẽ đƣợc cấp một tài khoản
duy nhất, có thể tao tác trên hệ thống với phân quyền phù hợp.<br>
*Tạo và quản lý ngân hàng câu hỏi
Câu hỏi đƣợc các giảng viên cập nhật lên hệ thống theo môn học và mức độ câu
hỏi: nhận biết, thông hiểu, vận dụng và vận dụng cao. Sau khi đƣợc cập nhật, câu
hỏi phải trải qua sự kiểm duyệt của trƣởng bộ môn mới đƣợc lữu lâu dài, những câu
hỏi không đƣợc duyệt sẽ bị xóa đi. Với 2 chức năng cập nhật câu hỏi từng câu và
cập nhật bằng file theo định dạng mẫu, hệ thống cho phép ngƣời dùng cập nhật câu
hỏi kèm hình ảnh và cập nhật cùng lúc nhiều câu hỏi giúp tiết kiệm thời gian, công
sức.
*Ra đề thi:
Cán bộ nhập vào các thông tin cần thiết của đề thi và cấu trúc đề thi nhƣ số câu
hỏi cho từng mức độ. Đề thi sẽ đƣợc trộn ngẫu nhiêu từ ngân hàng câu hỏi, ƣu tiên
cho các câu hỏi có số lần xuất hiện trong các đề thi ít, để tạo thành một đề thi gốc và
lƣu trữ trên hệ thống. Ngƣời dùng có thể xuất đề thi dƣới dạng file word, mỗi lần
Phần mềm quản lý ngân hàng câu hỏi ra đề thi GVHD: Lê Hoàng Thảo
Hồ Thị Lài - Nguyễn Thị Mỹ Quyên 14
xuất đề ta sẽ nhận đƣợc một đề thi đƣợc trộn ngẫu nhiêu từ đề gốc kèm theo là file
đáp án cho tất cả câu hỏi trong đề.
*Thi onlie
Sinh viên sẽ đƣợc cấp tài khoản để truy cập vào hệ thống, nhận đề từ hệ thống và
mật khẩu đề đƣợc cung cấp bởi giảng viên để mở bài thi và thực hiện làm bài. Hệ
thống cung cấp chức năng lƣu nhƣng không nộp giúp lƣu lại trạng thái bài làm của
sinh viên, phòng trƣờng hợp gặp sự cố gián đoạn, sau đó sinh viên vẫn có thể truy
cập và thực hiện tiếp tục bài thi. Khi hết thời gian làm bài hoặc sinh viên thực hiện
nộp bài, hệ thống sẽ kiểm tra bài làm của sinh viên và chấm điểm dựa trên đáp án
trong ngân hàng câu hỏi. Hệ thống trả kết quả cho sinh viên.

