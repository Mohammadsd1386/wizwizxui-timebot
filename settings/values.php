```php
<?php

$mainValues = [
    'banned' => '❌ | هی بهت گفتم آدم باش گوش نکردی ، الان مسدود شدی 😑😂',
    'customer_custome_plan_day' => "⏰|لطفا  تعداد روز اشتراکت رو وارد کن\n💰|هزینه هر روز: DAY-PRICE",
    'customer_custome_plan_volume'=>"🔋|لطفا مقدار گیگابایت سرویست رو وارد کن\n💰|هزینه هر گیگ: VOLUME-PRICE",
    'customer_custome_plan_name'=>'اسم کانفیگ رو وارد کن ( حروف انگیلیسی و عدد باهم وارد کنید )',
    'send_user_id'=>"🀄️| آیدی عددی کاربر رو بفرس :",
    'enter_decrease_amount'=>"💸 | مبلغی که میخوای ازش کم کنی رو وارد کن:",
    'enter_increase_amount'=>"💸 | مبلغی که میخوای بهش بدی رو وارد کن:",
    'user_not_found'=>"🥴 | همچین کسی رو نداریما اشتباه وارد کردی به نظرم",
    'amount_decreased_from_your_wallet'=> "✅ مبلغ AMOUNT تومان از حساب شما کم شد",
    'amount_decreased_from_user_wallet'=>"✅ مبلغ AMOUNT تومان از کیف پول کاربر مورد نظر کم شد",
    'increase_wallet_cart_to_cart'=>"♻️ عزیزم یه تصویر از فیش واریزی برام ارسال کن :

🔰 <code>ACCOUNT-NUMBER</code> - HOLDER-NAME

✅ بعد از اینکه پرداختت تایید شد مبلغ مورد نظر به کیف پولت اضافه میشه!",
    'order_increase_sent'=>"🥇 سفارش شما با موفقیت ثبت شد.
    بعد از تایید به کیف پولت اضافه میکنم ... 💞",
    'please_send_only_image'=>"لطفا فقط عکس ارسال کنید",
    'reached_main_menu'=>"خب برگشتم عقب اگه کاری داری بگو 😉 | اگه خواستی یکی از گزینه هارو انتخاب کن که کارتو انجام بدم

🚪 /start",
    'increase_wallet_request_message'=>"💳 درخواست ( افزایش موجودی )

💰مبلغ: PRICE تومان
🧑‍💻 نام و نام خانوادگی : NAME
🎯 یوزرنیم : @USERNAME
🎫 کد کاربری : <code>USER-ID</code>
",
    'out_of_connection_capacity'=>'ظرفیت این کانکشن پر شده است',
    'out_of_server_capacity'=>'ظرفیت این سرور پر شده است',
    'can_create_specific_account'=> "روی این پلن فقط AMOUNT اکانت میشه ساخت",
    'buy_account_cart_to_cart'=>"♻️ عزیزم یه تصویر از فیش واریزی یا شماره پیگیری -  ساعت پرداخت - نام پرداخت کننده رو در یک پیام برام ارسال کن :

🔰 <code>ACCOUNT-NUMBER</code> - HOLDER-NAME

✅ بعد از اینکه پرداختت تایید شد ( لینک سرور ) به صورت خودکار از طریق همین ربات برات ارسال میشه!",
    'renew_ccount_cart_to_cart'=>"♻️ عزیزم یه تصویر از فیش واریزی یا شماره پیگیری -  ساعت پرداخت - نام پرداخت کننده رو در یک پیام برام ارسال کن :

🔰 <code>ACCOUNT-NUMBER</code> - HOLDER-NAME",
    'order_buy_sent'=>"🛍 سفارشت با موفقیت ثبت شد.
بعد از تایید برات ارسال میکنم ... 🥳",
    'buy_custom_account_request'=>"💓 خرید پلن دلخواه ( TYPE )
    
▫️آیدی کاربر: USER-ID
👨‍💼اسم کاربر: <a href='tg://user?id=USER-ID'>NAME</a>
⚡️ نام کاربری: @USERNAME
💰مبلغ پرداختی: PRICE تومان
✏️ نام سرویس: REMARK
🔋حجم سرویس: VOLUME گیگ
⏰ مدت سرویس: DAYS روز",
    'buy_new_account_request'=>"❗️|💳 خرید جدید ( TYPE )

▫️آیدی کاربر: USER-ID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
💰مبلغ پرداختی: PRICE تومان
🚦سرور: SERVERNAME
✏️ نام سرویس: REMARK
🔋حجم سرویس: VOLUME گیگ
⏰ مدت سرویس: DAYS روز",
    'buy_new_much_account_request'=>"❗️|💳 خرید جدید ( TYPE )

▫️آیدی کاربر: USER-ID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
💰مبلغ پرداختی: PRICE تومان
🏖 تعداد اکانت: ACCOUNT-COUNT
✏️ نام سرویس: REMARK",
    'invite_buy_new_account'=>"👨‍👦‍👦 خرید ( زیر مجموعه )

🧝‍♂️آیدی کاربر: USER-ID
🛡اسم کاربر: NAME
🔖 نام کاربری: USERNAME
💰مبلغ پرداختی: PRICE تومان
🔮 نام سرویس: REMARK
💮 سفارش: FILENAME",
    'renew_order_sent'=>"✅| دوست عزیز ، درخواستت با موفقیت ثبت شد، بعد از بررسی و تمدید ادمین کانفیگ رو برات میفرستم ممنون از صبوریت 
    
🚪 /start",
    'renew_account_request_message'=>"♻️ تمدید سرویس ( TYPE )

▫️آیدی کاربر: USER-ID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
💰مبلغ پرداختی: PRICE تومان
✏️ نام سرویس: REMARK
🔋حجم سرویس: VOLUME گیگ
⏰ مدت سرویس: DAYS روز",
    'increase_account_request_message'=>"⏰ درخواست افزایش ( TYPE سرویس )

▫️آیدی کاربر: USER-ID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
🎈 نام سرویس: REMARK
🔋TYPE افزایش: INCREASE گیگ/روز
💰قیمت: PRICE تومان",
    'waiting_message'=>'⏳ در حال انتظار ...',
    'join_channel_message'=>"❌ برای استفاده از ربات حتما باید در کانال زیر عضو شوید:
    
✅ بعد از اینکه عضو شدید روی دکمه عضو شدم بزنید

",
    'bot_is_updating'=> "🌛ربات در حال بروزرسانی می باشد ...",
    'select_one_to_show_detail'=> ' 🔅 یکی از سرویس هاتو انتخاب کن و مشخصات کاملش رو ببین :',
    'you_dont_have_config'=>'عزیزم هیچ سفارشی نداری 🙁 باید یه کانفیگ خریداری کنی',
    'no_order_found'=> "موردی یافت نشد",
    'config_details_message'=>"وضعیت کانفیگ: STATE
    
🔮 نام کانفیگ : NAME

لینک اتصال: CONNECT-LINK

لینک سابسکریبشن: SUB-LINK
⁮⁮ ⁮⁮ ⁮⁮ ⁮⁮
",
    'please_wait_message'=>"🙃 | لطفا منتظر باشید",
    'send_only_number'=> "😡 | مگه نمیگم فقط عدد بفرس نمیفهمی؟ یا خودتو زدی به نفهمی؟",
    'change_bot_settings_message'=>'🔰هرکدوم از امکانات رو اگه تو ربات استفاده ای نداره ( خاموش ) کن !',
    'saved_successfuly'=>"✅|با موفقیت ذخیره شد",
    'invited_user_joined_message'=>"😍|تبریک یه نفر با لینک شما وارد ربات شد",
    'please_select_from_below_buttons'=>"🔘|لطفا فقط از کلید زیر استفاده کنید",
    'use_iranian_number_only'=>"🔘|لطفا فقط با شماره ایرانی اقدام کنید",
    'phone_confirmed'=>"✅|شماره شما با موفقیت تأیید شد",
    'send_your_phone_number'=>"سلام عزیزم، برای استفاده از ربات شماره تماس خود را با استفاده از کلید زیر ارسال کنید 👇",
    'start_message'=>'سلااام به ربات ویزویز خوش اومدی 🫡🌸
    
ما اینجاییم تا شما را بدون هیچ محدویتی به شبکه جهانی متصل کنیم ❤️

✅ کیفیت در ساخت انواع کانکشن ها
📡 برقرای امنیت در ارتباط شما
☎️ پشتیبانی تا روز آخر 

🚪 /start',
    'new_member_joined'=>"📢 | یه گل جدید عضو ربات شد :

نام و نام خانوادگی: FULLNAME
نام کاربری: @USERNAME
آیدی عددی: USERID

به نظرم یه پیام براش بفرست مثلا ( تبلیغی یا خوش آمد گویی ) 😍",
    "not_joine_yet"=>"هنوز که عضو کانال نشدی",
    'insert_discount_code'=>"🎁|کد تخفیف تو را وارد کن:",
    "not_valid_discount_code"=>"😔|کد تخفیفی که وارد کردی معتبر نیس",
    'valid_discount_code'=>"✅|کد تخفیف با موفقیت استفاده شد
مقدار تخفیف AMOUNT تومان",
    'used_discount_code'=>"☑️|🎁 کد تخفیف استفاده شد

🔰آیدی کاربر: USERID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
🎁 کد تخفیف: DISCOUNTCODE
💰مقدار تخفیف: AMOUNT تومان
⁮⁮ ⁮⁮",
    "send_config_uuid"=>"❗️| لینک کانفیگ یا uuid رو برام بفرس اطلاعات کامل رو تحویلت بدم 🤭",
    'not_correct_text'=>"متن وارد شده معتبر نمی باشد",
    'receving_information'=>"♻️در حال دریافت جزییات ... ",
    'request_agency_message'=>"درخواست نمایندگی

🔰آیدی کاربر: USERID
👨‍💼اسم کاربر: NAME
⚡️ نام کاربری: USERNAME
⁮⁮ ⁮⁮",
    'agency_request_sent'=>"درخواست شما با موفقیت ارسال شد، لطفا منتظر باشید!⁮⁮ ⁮⁮",
    'agency_request_already_sent'=>"درخواست شما قبلاً ارسال شده، لطفا منتظر باشید!⁮⁮ ⁮⁮",
    'agency_request_declined'=>"🥺 درخواست شما برای نمایندگی رد گردید",
    'agency_request_approved'=>"✅ درخواست شما برای نمایندگی تأیید شد",
    'send_agent_discount_percent' =>"لطفا مقدار تخفیف این نمایندگی را  به صورت درصد وارد کنید، مثلا 10",
    'agent_setting_message' =>" 🧚🏻‍♀️ نماینده محترم:

از این بخش میتوانید خرید تکی و خرید انبوه داشته باشید و همچنین کانفیگ های خریداری شده را مدیریت کنید",
    'selling_is_off'=>"فعلا فروش نداریم",
    'no_server_available'=>"😔 | عزیز دلم هیچ سرور فعالی نداریم لطفا بعدا مجدد تست کن",
    'buy_sub_select_location' => '  1️⃣ مرحله یک:

لوکیشن مدنظرت رو برا خرید انتخاب کن: 😊',
    'the_bot_in_not_admin' => "😡|ای بابا ،ربات هنوز تو کانال عضو نشده، اول ربات رو تو کانال ادمین کن و آیدیش رو بفرست",
    'category_not_avilable'=>"هیچ دسته بندی برای این سرور وجود ندارد",
    'receive_categories'=>"♻️ | دریافت دسته بندی ...",
    'buy_sub_select_category'=> "2️⃣ مرحله دوم:

دسته بندی مورد نظرت رو انتخاب کن 🤭",
    'no_plan_available'=>"💡پلنی در این دسته بندی وجود ندارد",
    'receive_plans'=>"📍در حال دریافت لیست پلن ها",
    'buy_sub_select_plan'=> "3️⃣ مرحله سه:

یکی از پلن هارو انتخاب کن و برو برای پرداختش 🤲 🕋", 
    'buy_custom_plan'=>'➕ پلن دلخواه تو بخر',
    'select_one_plan_to_edit'=>"یکی از پلن ها رو انتخاب کن تا برات ویرایشش کنم", 
    'enter_account_amount' => "♻️ تعداد اکانت درخواستی رو وارد کن حداکثر هربار 6 عدد:

⚠️ | نکته: در صورت وارد کردن به مقدار بالا احتمالا اکانت ساخته نشود و پنل x-ui گیر کند",
    'send_positive_number'=>"لطفا عددی بزرگتر از 0 وارد کنید",
    'buy_subscription_detail'=>"〽️ نام پلن: PLAN-NAME
        ➖➖➖➖➖➖➖
        💎 قیمت پنل : PRICE
        ➖➖➖➖➖➖➖
        📃 توضیحات :
        DESCRIPTION
        ➖➖➖➖➖➖➖",
    'buy_much_subscription_detail'=>"〽️ نام پلن: PLAN-NAME
        تعداد اکانت: ACCOUNT-COUNT
        قیمت پنل: PRICE
        ➖➖➖➖➖➖➖
        💎 قیمت کل : TOTAL-PRICE
        ➖➖➖➖➖➖➖
        📃 توضیحات :
        DESCRIPTION
        ➖➖➖➖➖➖➖",
    'buy_custom_subscription_detail'=>"〽️ نام پلن: PLAN-NAME
        حجم اختصاصی: VOLUME GB
        مدت اختصاصی: DAYS روز
        ➖➖➖➖➖➖➖
        💎 قیمت پنل : PRICE
        ➖➖➖➖➖➖➖
        📃 توضیحات :
        DESCRIPTION
        ➖➖➖➖➖➖➖",
    "agents_list" => "🔍 لیست نمایندگان:

جهت مشاده آمار فروش نمایندگان روی اسم نماینده کلیک کنید، همچنین میتوانید برای نماینده درصد تعیین کنید یا آن را از لیست نمایندگان خارج کنید",
    'agent_deleted_successfuly'=>"نمایندگی با موفقیت حذف شد",
    'agent_details'=>'🙎‍♂️اطلاعات نماینده AGENT-NAME

سمت راست درآمد و سمت چپ تعداد خرید نماینده می باشد',
    'send_config_remark'=>"لطفا ریمارک کانفیگ را وارد کنید",
    'forward_your_message'=>"لطفا پیام مورد نظر خود را به ربات فروارد کنید",
    "enter_ticket_title"=>"💠لطفا موضوع تیکت را ارسال کنید!",
    "enter_ticket_description"=> "💠لطفا متن و یا عکس تیکت را بصورت ساده و مختصر ارسال کنید!",
    "sent_config_to_user"=> '✅ کانفیگ و براش ارسال کردم
ریمارک: REMARK
حجم سرویس: VOLUME گیگ
مدت زمان سرویس: DAYS روز',
    "renewed_config_to_user"=> '✅ کانفیگ و براش تمدید کردم
ریمارک: REMARK
حجم سرویس: VOLUME گیگ
مدت زمان سرویس: DAYS روز',
    'sending_config_to_user'=>'🚀 | 😍 در حال ارسال کانفیگ به مشتری ...',
    'config_not_found'=>"مشکلی پیش اومده، دوباره از نو انجام بده",
    'incorrect_config_name'=>"😡|اسم وارد شده معتبر نمی باشد",
    'pay_with_tron_wallet'=>"♻️ عزیزم مبلغ AMOUNT ترون رو به والت زیر ارسال کن و تکسید آیدی واریزی ترون رو برام ارسال کن :

🔰 <code>TRON-WALLET</code>",
    'incorrect_tax_id'=>"تکسید آیدی وارد شده نامعتبر است",
    'used_tax_id'=>"این تکسید آیدی قبلا استفاده شده است",
    'in_review_tax_id'=>"تراکنش شما در صف بررسی قرار گرفت",
    'user_taxid_rejected'=>"تراکنش ناموفق TYPE (ترون)
    
آیدی کاربر: USERID
اسم: NAME
یوزرنیم: USERNAME

تکسید آیدی: TAXID

<b>بعد از 5 تلاش رد گردید</b>",
    'your_taxid_rejected'=>"تراکنش TYPE شما با تکسید آیدی: TAXID

<b>بعد از 5 تلاش رد شد</b>",
    'incorrect_user_taxid_rejected'=>"تراکنش ناموفق TYPE (ترون)
    
آیدی کاربر: USERID
اسم: NAME
یوزرنیم: USERNAME

تکسید آیدی: TAXID

<b>به دلیل ثبت تراکنش نادرست رد شد</b>",
    'your_incorrect_taxid_rejected'=>"تراکنش TYPE شما با تکسید آیدی: TAXID

<b>به دلیل ثبت تراکنش نادرست رد شد</b>",
    'partially_paid_user_taxid'=>"تراکنش ناموفق TYPE (ترون)
    
آیدی کاربر: USERID
اسم: NAME
یوزرنیم: USERNAME

تکسید آیدی: TAXID

<b>به دلیل عدم مطابقت مبلغ تراکنش رد شد</b>",
    'you_have_partially_paid'=>"تراکنش TYPE شما با تکسید آیدی: TAXID

<b>به دلیل عدم مطابقت مبلغ تراکنش رد شد</b>",
    'agent_discount_settings'=>"مدیریت تخفیف های نماینده AGENT-NAME",
    'config_doesnt_exist'=>"کانفیگ یافت نشد",
    
    // امکانات جدید
    'other_features_welcome' => '🌟 به بخش امکانات دیگر خوش آمدید

از این بخش می‌توانید به امکانات ویژه دسترسی داشته باشید.',
    
    'tutorial_list_empty' => '📚 هنوز آموزشی اضافه نشده است.',
    
    'lottery_info' => '🎰 قرعه‌کشی

برای شرکت در قرعه‌کشی باید:
✅ عضو کانال باشید
✅ حداقل یک خرید موفق داشته باشید

🎁 جوایز شامل اشتراک رایگان و تخفیف ویژه است.',
    
    'no_active_lottery' => '❌ در حال حاضر قرعه‌کشی فعالی وجود ندارد',
    
    'charity_welcome' => '❤️ بخش خیریه

با هر خرید، درصدی از مبلغ به کمپین‌های خیریه اختصاص می‌یابد.

شما می‌توانید مستقیماً نیز کمک کنید.',
    
    'web_panel_access' => '🌐 دسترسی به پنل وب

برای دسترسی به پنل وب کلیک کنید:
🔗 [دسترسی به پنل](PANEL_URL)

⚠️ این لینک 1 ساعت اعتبار دارد.',
    
    'auto_renewal_enabled' => '✅ تمدید خودکار فعال شد

🔄 سرویس شما 3 روز قبل از انقضا تمدید خواهد شد.',
    
    'auto_renewal_disabled' => '⏸️ تمدید خودکار غیرفعال شد',
    
    'tutorial_sent' => '✅ آموزش مربوطه ارسال شد

📱 لطفاً آموزش‌ها را با دقت مطالعه کنید.',
    
    'rating_request' => '⭐ نظر شما برای ما مهم است

لطفاً کیفیت سرویس را از 1 تا 5 ستاره امتیازدهی کنید:',
    
    'rating_saved' => '⭐ امتیاز شما ثبت شد. بازخورد شما برای ما ارزشمند است!',
    
    'already_rated' => '✅ شما قبلاً این سرویس را امتیازدهی کرده‌اید',
    
    'fraud_warning' => '⚠️ فعالیت مشکوک تشخیص داده شد

حساب شما در حال بررسی است.',
    
    'smart_discount_applied' => '🧠 تخفیف هوشمند اعمال شد!

به دلیل وفاداری شما، DISCOUNT_PERCENT درصد تخفیف دریافت کردید.',
    
    'backup_created' => '✅ فایل بکاپ ایجاد شد

💾 نام فایل: BACKUP_NAME
📅 تاریخ: BACKUP_DATE',
    
    'agent_stats_info' => '📊 آمار نمایندگی شما:

👥 تعداد زیرمجموعه: REFERRALS
💰 مجموع فروش: TOTAL_SALES تومان
💵 کمیسیون کسب شده: COMMISSION تومان',
    
    'settlement_request_sent' => '✅ درخواست تسویه ارسال شد

درخواست شما در صف بررسی قرار گرفت.',
    
    'insufficient_balance_charity' => '❌ موجودی کافی برای کمک خیریه ندارید',
    
    'charity_donation_success' => '❤️ کمک شما ثبت شد

مبلغ AMOUNT تومان به صندوق خیریه واریز شد.',
    
    'feature_disabled' => '❌ این امکان در حال حاضر غیرفعال است',
    
    'web_panel_disabled' => '❌ دسترسی شما به پنل وب محدود شده است',
    
    'telegram_stars_payment' => '⭐ پرداخت با استارز تلگرام

مبلغ: AMOUNT استار
آیا تایید می‌کنید؟',
    
    'stars_payment_success' => '✅ پرداخت با استارز موفق بود',
    
    'stars_insufficient' => '❌ استارز کافی ندارید',
    
    'earning_info' => '💰 راه‌های کسب درآمد

📍 دعوت دوستان: REFERRAL_COMMISSION تومان به ازای هر خرید
📍 نمایندگی: تا AGENT_COMMISSION درصد کمیسیون
📍 شرکت در قرعه‌کشی‌ها',
    
    'web_panel_token_expired' => '⏰ زمان دسترسی به پنل وب منقضی شده است',
    
    'tutorial_category_android' => '📱 آموزش اندروید',
    'tutorial_category_ios' => '🍎 آموزش iOS',
    'tutorial_category_windows' => '🪟 آموزش ویندوز',
    'tutorial_category_mac' => '🖥 آموزش مک',
    'tutorial_category_linux' => '🐧 آموزش لینوکس',
    
    'last_connection_info' => '🕐 آخرین اتصال: LAST_CONNECTION',
    'never_connected' => '❌ هنوز متصل نشده',
    
    'config_qr_generated' => '🔳 کیو آر کد کانفیگ ایجاد شد',
    'subscription_qr_generated' => '🔳 کیو آر کد ساب ایجاد شد',
    
    'multiple_card_payment' => '💳 پرداخت با کارت‌های متعدد

می‌توانید با چندین کارت پرداخت کنید.',
    
    'payment_completed' => '✅ پرداخت با موفقیت انجام شد',
    'payment_failed' => '❌ پرداخت ناموفق بود',
    'payment_pending' => '⏳ پرداخت در انتظار تایید است',
    
    'system_maintenance' => '🔧 سیستم در حال تعمیر و نگهداری است',
    'service_temporarily_unavailable' => '⚠️ سرویس موقتاً در دسترس نیست'
];

$buttonValues = [
    'bot_reports'=>"📉 آمار کلی ربات",
    'message_to_user'=>"📞 پیام خصوصی",
    'user_reports'=>"🔑 اطلاعات کاربر",
    'admins_list'=>"👤 لیست ادمین ها",
    'increase_wallet'=>"💵 افزایش موجودی",
    'decrease_wallet'=>"💸 کاهش موجودی",
    'create_account'=>"⌨️ ایجاد اکانت انبوه",
    'ban_user'=>"❌ مسدود کردن کاربر",
    'unban_user'=>"✅ آزاد کردن کاربر",
    'server_settings'=>'🚦مدیریت و تنظیمات سرورها',
    'categories_settings'=>'🗂 مدیریت دسته ها',
    'plan_settings'=>'🪣 مدیریت پلن ها',
    'discount_settings'=>"🎁 مدیریت تخفیف ها",
    'main_button_settings'=>"🕹 مدیریت دکمه ها ",
    'gateways_settings'=>'💳 تنظیمات درگاه و کانال',
    'bot_settings'=>'⚙️ تنظیمات ربات',
    'tickets_list'=>'📪 تیکت ها',
    'message_to_all'=>"📨 ارسال پیام همگانی",
    'forward_to_all'=>"📨 فروارد پیام همگانی",
    'back_to_main'=>'⤵️ برگرد به منوی اصلی ',  
    'cart_to_cart'=>"💳 کارت به کارت",
    'now_payment_gateway'=>"💳 درگاه NowPayment",
    'zarinpal_gateway'=> "💳 درگاه زرین پال",
    'nextpay_gateway'=>"💳 درگاه نکست پی",
    'weswap_gateway'=>"💳 درگاه ارزی ریالی",
    'approve' => 'تایید ✅',
    'approved' => 'تایید شد',
    'decline' => 'عدم تایید ❌',
    'declined' => 'رد شد',
    'back_button'=> "برگشت 🔙",
    'renew_connection_link'=>"🚷 قطع دسترسی و لینک جدید",
    'update_config_connection'=>"⌛️ بروزرسانی کانفیگ",
    'increase_config_volume'=>"🩸 افزایش حجم سرویس",
    'increase_config_days'=>"📆 افزایش زمان سرویس",
    'renew_config'=>'♻ تمدید سرویس',
    'change_config_location'=>'🌎 تغییر لوکیشن',
    'selected_protocol'=>"🚦 پروتکل انتخابی",
    'volume_left'=>"⏳ حجم باقیمانده:",
    'expire_date'=>"⏰  تاریخ انقضاء: ",
    'buy_date'=>"⏰  تاریخ خرید: ",
    'plan_name'=>" 🚀 نام پلن:",
    'on'=>"روشن ✅",
    'off'=>"خاموش ❌",
    'active'=>"فعال 🟢",
    'deactive'=>"غیر فعال 🔴",
    'send_phone_number'=>'☎️ ارسال شماره',
    'send_message_to_user'=>"✉️ ارسال پیام به کاربر ",
    'cancel' => '😪 منصرف شدم بیخیال',
    'join_channel'=>"عضویت در کانال",
    'have_joined'=>"عضو شدم ✅",
    'gift_volume_day'=>"🎯 هدیه حجم و زمان",
    'test_account'=>"🎁 دریافت اکانت تست ",
    'invite_friends'=>"🏆 زیر مجموعه گیری",
    'my_info'=>"🧑‍💼 حساب کاربری",
    'my_subscriptions'=>'📱 کانفیگ های من',
    'buy_subscriptions'=>'🛒  خرید کانفیگ جدید',
    'shared_existence'=>"❕ موجودی اشتراکی ",
    'individual_existence'=>"❗️ موجودی اختصاصی ",
    'application_links'=>'🧩 آموزش اتصال',
    'my_tickets'=>"📨 تیکت های من",
    'search_config'=>"🪫 مشخصات کانفیگ",
    'delete_config'=>"❌ حذف کانفیگ",
    'pay_with_wallet' => "💰پرداخت با موجودی",
    'request_agency' =>"🧑‍💼 درخواست نمایندگی 🧑‍💼",
    'agency_setting' =>"➰ پنل همکاری ➰",
    'agent_one_buy'=>"➕ خرید تکی",
    'agent_much_buy'=>"♾ خرید انبوه",
    'agent_bought_accounts'=>"تعداد خرید",
    'agent_joined_date'=>"تاریخ عضویت",
    'agent_agency_date'=>"تاریخ نمایندگی",
    "agent_list"=>" 📍 مدیریت نمایندگان 📍",
    'search_agent_config'=>"جستجوی کانفیگ",
    'search_admin_config'=>"جستجوی کانفیگ کاربر",
    'sharj'=>"✅ 💳 ارسال رسید - شارژ کیف پول",
    "qr_config"=>"🔳 کیو آر کانفیگ",
    "qr_sub"=>"🔳 کیو آر ساب",
    'start_bot'=>"شروع ربات",
    'enable_config'=>"فعال سازی کانفیگ",
    'disable_config'=>"غیر فعال سازی کانفیگ",
    "tron_gateway"=>"درگاه ترون",
    'plan_discount'=>"روی پلن",
    'server_discount'=>"روی سرور",
    
    // کلیدهای جدید
    'other_features' => '🌟 امکانات دیگر',
    'tutorial_management' => '📚 مدیریت آموزش‌ها', 
    'lottery_section' => '🎰 قرعه‌کشی',
    'charity_section' => '❤️ بخش خیریه',
    'web_panel' => '🌐 پنل وب',
    'earning_money' => '💰 کسب درآمد',
    'smart_discounts' => '🧠 تخفیفات هوشمند',
    'financial_reports' => '📊 گزارشات مالی',
    'fraud_detection' => '🔍 تشخیص تقلب',
    'backup_management' => '💾 مدیریت بکاپ',
    'system_logs' => '📝 لاگ‌های سیستم',
    'auto_renewal' => '🔄 تمدید خودکار',
    'config_tutorials' => '📱 آموزش کانفیگ',
    'rate_service' => '⭐ امتیاز به سرویس',
    'pay_with_stars' => '⭐ پرداخت با استار',
    'charity_donation' => '❤️ کمک خیریه',
    'agent_stats' => '📊 آمار نمایندگی',
    'request_settlement' => '💰 درخواست تسویه',
    'agent_tutorials' => '📖 آموزش نمایندگی',
    'manage_plans' => '📋 مدیریت پلن‌ها',
    'send_message_to_all' => '📢 پیام همگانی',
    'advanced_management' => '🧠 مدیریت پیشرفته',
    'lottery_management' => '🎰 مدیریت قرعه‌کشی',
    'tutorial_categories' => '📚 دسته‌بندی آموزش‌ها',
    'add_tutorial' => '➕ افزودن آموزش',
    'edit_tutorials' => '📝 ویرایش آموزش‌ها',
    'tutorial_stats' => '📊 آمار آموزش‌ها',
    'start_lottery' => '🎲 شروع قرعه‌کشی',
    'announce_winner' => '🏆 اعلام برنده',
    'lottery_settings' => '⚙️ تنظیمات قرعه‌کشی',
    'daily_report' => '📊 گزارش روزانه',
    'weekly_report' => '📈 گزارش هفتگی',
    'monthly_report' => '📉 گزارش ماهانه',
    'yearly_report' => '📋 گزارش سالانه',
    'custom_report' => '🔧 گزارش سفارشی',
    'agent_panel' => '👨‍💼 پنل نمایندگی',
    'contact_support' => '📞 تماس با پشتیبانی',
    'copy_config' => '📋 کپی کانفیگ',
    'download_config' => '📥 دانلود کانفیگ',
    'get_config' => '📱 دریافت کانفیگ',
    'renew_service' => '🔄 تمدید سرویس',
    'enable_auto_renewal' => '🔄 فعال کردن تمدید خودکار',
    'disable_auto_renewal' => '⏸️ غیرفعال کردن تمدید خودکار',
    'request_tutorial' => '📚 درخواست آموزش',
    'view_tutorial' => '👁‍🗨 مشاهده آموزش',
    'participate_lottery' => '🎲 شرکت در قرعه‌کشی',
    'donate_charity' => '❤️ کمک خیریه',
    'access_web_panel' => '🌐 دسترسی پنل وب',
    'view_earning_info' => '💰 مشاهده راه‌های درآمد',
    'view_agent_stats' => '📊 مشاهده آمار نمایندگی',
    'income_history' => '💰 تاریخچه درآمد',
    'referrals_list' => '👥 لیست زیرمجموعه‌ها',
    'multiple_cards' => '💳 کارت‌های متعدد',
    'last_connection' => '🕐 آخرین اتصال',
    'never_connected' => '❌ متصل نشده',
    'generate_qr' => '🔳 تولید QR کد',
    'one_star' => '⭐',
    'two_stars' => '⭐⭐',
    'three_stars' => '⭐⭐⭐',
    'four_stars' => '⭐⭐⭐⭐',
    'five_stars' => '⭐⭐⭐⭐⭐',
    'fraud_users' => '🚨 کاربران مشکوک',
    'create_backup' => '💾 ایجاد بکاپ',
    'view_logs' => '📝 مشاهده لاگ‌ها',
    'system_status' => '⚡ وضعیت سیستم',
    'maintenance_mode' => '🔧 حالت تعمیر',
    'emergency_stop' => '🛑 توقف اضطراری'
];
?>
```