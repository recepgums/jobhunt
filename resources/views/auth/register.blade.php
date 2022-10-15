@extends('layout.app')

@section('style')
    <style>
        p{
            font-size: 12px;
            font-weight: 400;
            font-family: Montserrat,Helvetica,Arial,sans-serif;
        }
        .modal-body{
            max-height: 80vh;
            overflow-y: scroll;
        }
    </style>
@endsection
@section('content')
    <div class="modal fade" id="serviceAgreement" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content" style="width: 750px; margin-left: -140px;">
                <div class="modal-header">
                    <button type="button" class="close" id="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jsx-97634155"><p><strong>İŞİN OLSUN PLATFORMU ADAY HİZMET SÖZLEŞMESİ</strong></p>
                        <p> İşbu Sözleşme, halihazırda isinolsun.com veya İşin Olsun cep telefonu uygulaması üzerinde
                            yer alan platform ("Platform") aracılığı ile verilen istihdama yönelik hizmetlerle, bu
                            hizmetler için Platform içinde yapılan veri toplama ve Platform dışında yapılan araştırma ve
                            pazarlama aktiviteleri de dahil olmak üzere bu Sözleşme altında sunulduğu ifade edilen diğer
                            tüm hizmetler ("Hizmetler") için geçerlidir.</p>
                        <p> "Aday", çalışan arayan ve Kariyer.net platform'unun kullanımı için aktif sözleşmesi bulunan
                            kayıtlı kullanıcıları ise "İşveren Müşteri" olarak adlandırılır. İşbu Sözleşme Aday için
                            geçerlidir.</p>
                        <p><strong>TANIMLAR</strong></p>
                        <p> Aday; Hizmet Sözleşmesini onaylayarak, iş ilanına başvuru yapma,iş ilanı için firmayı arama
                            gibi edimlerde bulunan üyelerini</p>
                        <p> İşveren; Kariyer.net platform'unun kullanımı için aktif sözleşmesi bulunan ve hizmeti iş
                            ilanı yayımlama, başvuru toplama, personel istihdam etmek üzere kullanan üyeleri ifade
                            eder.</p>
                        <p><strong>PLATFORM KULLANIMINA İLİŞKİN HÜKÜMLER</strong></p>
                        <p> 1. Aday kullanıcılar üyelik gerçekleştirmeden tüm ilanları görüntüleyebilir, detaylarına
                            ulaşabilir ve inceleyebilirler ancak başvurmak veya işvereni aramak için üyelik adımını
                            tamamlamaları gerekir.</p>
                        <p> 2. Üyelik adımında adayın GSM numarası, adı soyadı ve mesleğinin girilmesi ve adresin
                            belirtilmesi zorunludur. İsim, soy isim,meslek ve adres bilgileri, işverenin kişiyi
                            değerlendirebilmesi için verilen zorunlu bilgilerdir. GSM numarası ise tek kullanımlık şifre
                            yöntemi ile doğrulama kodu iletilerek geçilen güvenlik adımı için zorunludur. Bu doğrulama
                            ile hem adayın hem de diğer kişilerin güvenliği sağlanmaktadır.</p>
                        <p> 3. İlk üyelik adımı geçildikten ve hesaba giriş yapıldıktan sonra opsiyonel olan iş
                            deneyimleri, yaş, adres, askerlik durumu gibi bilgileri aday istediği takdirde profiline
                            kaydedebilir.</p>
                        <p> 4. Üyelik sırasında veya sonrasında opsiyonel olarak aday tarafından profile fotoğraf
                            eklenmesi, değiştirilmesi ve kaldırılması yapılabilir. Bunun yanında, kişisel verilerinin
                            işlenmesi için onay vermemiş olan adayın, profiline fotoğraf eklemesi mümkün olmamaktadır.
                            Bunun sebebi, fotoğraf gibi biyometrik bir veri yüklenmesi için, ilgili mevzuata göre ilgili
                            kişinin (adayın) özel nitelikli kişisel verilerinin işlenmesine onay vermesi
                            gerektiğidir.</p>
                        <p> 5. Aday, ilana başvurmak için işverenin ilan açarken yaptığı seçime göre ilgilendiği ilan
                            için ilan kartında bulunan “Teklif Ver” butonu ile belirlediği teklifi ve teklif
                            açıklamasını belirtebilir ve ilana başvurabilir. İsteğe bağlı olarak iş ile ilgili
                            olarak“Ara” butonu ile İşvereni arayabilir. “Ara” seçeneği ile başvurduysa, kullanmakta
                            olduğu operatör üzerinden ücretlendirilmek sureti ile kendi tarifesi üzerinden işvereni
                            arayabilir. Söz konusu arama dolayısı ile adayın telefon faturasına yansıtılacak bedellerde
                            <a href="https://www.kariyer.net/">Kariyer.net</a>’in herhangi bir kontrolü, müdahalesi ve
                            sorumluluğu yoktur. Aday arama yaptığı anda söz konusu aramanın veya kullanılan internet
                            erişiminin kendi operatör tarifesi üzerinden ücretlendirileceğini bilmekte ve kabul
                            etmektedir.</p>
                        <p> 6. <a href="https://www.kariyer.net/">Kariyer.net</a><u> </u>sadece adayın işverene
                            ulaşmasını veya işverenin adaya ulaşmasını sağlamak amacıyla bu imkanları sağlamaktadır.
                            Aday, işbu Hizmet Sözleşmesi’ ni onaylayarak, arama veya mesajlaşma esnasında ve/veya
                            sonrasındaki işlemlerden, olaylardan ve kişiler arasında oluşabilecek sorunlardan kişiler
                            kendilerinin sorumlu olduğunu bilmekte ve kabul etmektedir.</p>
                        <p> 7. İşvereni mobil uygulama üzerinden arayan veya işveren tarafından uygulamadaki mesajlaşma
                            özelliği üzerinden ulaşılan aday, işveren ile arasında geçecek telefon görüşmesinin ve/veya
                            mesajlaşmaların, sonrasında gerçekleşebilecek yüz yüze veya online görüşmelerin içeriğinden
                            ve/veya işveren ile arasında gelişebilecek herhangi bir olaydan <a
                                href="https://www.kariyer.net/">Kariyer.net</a>’in sorumluluğu olmadığını kabul, beyan
                            ve taahhüt etmektedir. İşverenin ve/veya 3. kişilerin/kurumların söz konusu telefon
                            görüşmesi ve/veya mesajlaşma ve sonrasında gelişebilecek olaylarla ilgili her türlü
                            talebinden aday sorumludur.</p>
                        <p> 8. Aday, ilanına başvurduğu işveren ile uygulama üzerinden yapmış olduğu kayda alınan
                            mesajlaşmaların Kariyer.net tarafından 2 yıl süre ile saklanacağını ve şikayetlerin veya
                            taleplerin değerlendirilebilmesi için Kariyer.net ve çalışanları tarafından
                            görüntülenebileceğini bilmekte ve işbu Sözleşmenin imzalanması ile kabul etmekte ve onay
                            vermektedir. Aday ile Müşteri arasındaki mesajlaşma içeriğinden, mesajlaşma özelliğinin işbu
                            Sözleşme amacı ve/veya istihdam amacı dışında kullanılmasından Kariyer.net’in sorumlu
                            olmadığını Aday kabul, beyan ve taahhüt eder. Mesajlaşma ve içeriği ve sair nedenlerle 3.
                            kişilerin/kurumların Kariyer.net’e iletecekleri her türlü talepten aday ve/veya işveren
                            sorumludur.</p>
                        <p> 9. Bu nedenle <a href="https://www.kariyer.net/">Kariyer.net</a>’in herhangi bir ödeme
                            yapması gerektiği takdirde <a href="https://www.kariyer.net/">Kariyer.net</a> ödediği
                            miktarı adaya rücu edebilecektir. Aday bu hususu peşinen kabul eder.</p>
                        <p> 10. Aday, mobil uygulama üzerinden arama yaptığı anda ya da başvuru yöntemi ile başvuru
                            gerçekleştirdiğinde ve işveren adayı arağında telefon numarasının aradığı kişi/kurum
                            tarafından görüntüleneceğini, bilmekte ve kabul etmektedir. Aday, arama yaptıktan sonraki
                            tüm sorumluluğu bizzat üstlenmektedir.</p>
                        <p> 11. Aday iş ilanına başvuru için “ara” butonuna bastığı anda kullanmakta olduğu cihazın ID
                            numarası <a href="https://www.kariyer.net/">Kariyer.net</a> tarafından İşin Olsun mobil
                            uygulamasının işlevselliğini artırmak ve uygulamayı geliştirmek amaçlarıyla işlenir.</p>
                        <p> 12. Aday, konum bilgisine izin verdiği takdirde İşin Olsun mobil uygulaması, adayın konumuna
                            en yakın yerdeki iş fırsatlarını uygulama içerisinde listeler. Bu sebeple <a
                                href="https://www.kariyer.net/">Kariyer.net</a> adaydan konum bilgisi iznini
                            istemektedir. Aday adres bilgisini profiline kaydettiğinde ve işlenmesi için izni verdiğinde
                            ise “Evime Yakın” sekmesini kullanabilir ve ilanların bulunduğu işyerleriyle arasındaki
                            mesafeyi görebilecektir.</p>
                        <p> 13. Aday, ilanına başvuruda bulunduğu işverenin, kendisi ile uygulama içerisindeki
                            mesajlaşma özelliği üzerinden iletişime geçebileceğini, aday ile işveren arasındaki
                            mesajlaşmaların kaydedileceğini bilmekte ve bunu kabul etmekte ve onay vermektedir. Aday
                            uygulama içerisinde ilanına başvuruda bulunduğu işvereni mesaj atmaması için engelleyebilir
                            veya işveren tarafından engellenebilir.</p>
                        <p> 14. Aday, ilanına başvurduğu işveren ile uygulama üzerinden yapmış olduğu kayda alınan
                            mesajlaşmaların <a href="https://www.kariyer.net/">Kariyer.net</a> tarafından, ilgili yasal
                            mevzuat gereği 2 yıl süre ile saklanacağını ve şikayetlerin veya taleplerin
                            değerlendirilebilmesi için <a href="https://www.kariyer.net/">Kariyer.net</a> ve çalışanları
                            tarafından görüntülenebileceğini bilmekte ve işbu Sözleşmenin kabulu ile onay vermektedir.
                            Aday ile Müşteri arasındaki mesajlaşma içeriğinden, mesajlaşma özelliğinin işbu Sözleşme
                            amacı ve/veya istihdam amacı dışında kullanılmasından <a href="https://www.kariyer.net/">Kariyer.net</a>’in
                            hiçbir müdahalesi olmadığını day kabul, beyan ve taahhüt eder. Mesajlaşma ve içeriği ve sair
                            nedenlerle 3. kişilerin/kurumların <a href="https://www.kariyer.net/">Kariyer.net</a>’e
                            iletecekleri her türlü talepten aday ve/veya işveren sorumludur.</p>
                        <p> 15. Şirket'in aday tarafından Platform'a kayıt formunda belirtilen veya daha sonra kendisi
                            tarafından güncellenen iletişim adresleri üzerinden kullanıcıya iletişim, yeni ürünlerle,
                            sistem geliştirmeleri ile ilgili bildirim ve diğer amaçlarla ulaşma ve e-ileti gönderme
                            hakkı bulunmaktadır. Aday işbu Sözleşme'yi kabul etmekle aksine bir bildirimi olmadığı
                            müddetçe Şirket'in kendisine yönelik yukarıda belirtilen iletişim faaliyetlerinde
                            bulunabileceğini kabul ve beyan etmektedir. Aday, hesap ayarları üzerinden veya kendisine
                            gönderilen e-postada yer alan "Listeden çıkmak istiyorum" bağlantısını kullanarak tek tıkla
                            e-posta listesinden çıkabilir.</p>
                        <p> 16. Aday, yukarıda belirtilen kişisel verilerinin <a href="https://www.kariyer.net/">Kariyer.net</a>
                            tarafından işbu Üyelik Sözleşmesi ve Aday Üyelik Aydınlatma Metni ile ilgili mevzuat
                            hükümlerinden kaynaklanan yükümlülüklerinin ifası ve Aday’ın ilgili işverenlere ulaşmasını
                            ve/veya işverenin adaya ulaşmasının sağlanması ve/veya şikayet ve taleplerin
                            değerlendirilmesini sağlama amaçlarıyla işleneceğini bilmekte ve kabul etmektedir.</p>
                        <p> 17. İşin Olsun <a href="https://www.kariyer.net/">Kariyer.net</a> Elektronik Yayıncılık ve
                            İletişim Hizmetleri A.Ş.’ye (“ <a href="https://www.kariyer.net/">Kariyer.net</a>”) ait bir
                            mobil uygulamadır. İşin Olsun mobil uygulaması üzerinden işveren tarafından yayınlanan ilana
                            “ara” butonunu tıklamak ve işverenin ilanda belirtmiş olduğu telefon numarasını aramak
                            ve/veya işverenin ilanına başvuru bildirisi bırakmak ve/veya işveren tarafından uygulama
                            içindeki mesajlaşma özelliği üzerinden iletişime geçen aday, işbu Üyelik Sözleşmesi’ ni
                            kabul etmektedir.</p>
                        <p> 18. Aday, üyeliğini sona erdirmeyi ve/veya kişisel verilerinin imhasını talep etmesi halinde
                            EK-1’de bulunan formu doldurarak eksiksiz olarak doldurmak ve kimliğini ispatlamak kaydıyla
                            bu talebini <a href="mailto:adaydestek@kariyer.net">adaydestek@kariyer.net</a> mail adresine
                            iletir. Kariyer.net bu talebi aldığında kişinin kimliğini doğrulamak amacıyla, adayın
                            Platform’da kayıtlı telefon numarasına doğrulama kodu gönderme, adaya Platformda kayıtlı
                            telefon numarası üzerinden ulaşarak kimliğini doğrulamak gibi aksiyonlar alabilir. Aday,
                            işbu Hizmet Sözleşmesi’ni onaylamak kaydıyla, bu hususu bildiğini kabul, beyan ve taahhüt
                            eder.</p>
                        <p><strong>EK – I</strong></p>
                        <p><strong> KVKK KAPSAMINDA BAŞVURU HAKININ KULLANIMI İÇİN BAŞVURU FORMU </strong></p>
                        <p> Bu başvuru formu Veri Sahibi olarak Kişisel Verilerin Korunması Kanunu Madde 11 kapsamında
                            yer alan haklarınızı kullanabilmeniz amacıyla hazırlanmıştır.</p>
                        <p>1. <strong>AYDINLATMA</strong></p>
                        <p> Başvurunuz ve başvurunuza verdiğimiz cevabımız, savunma hakkımızı kullanmak veya
                            başvuruların organizasyonu veya yönetimi amacıyla veri kayıt ortamımızda saklanabilir ve
                            işlenebilir, bu amaçlarla avukatlarımız, veri işleyen durumundaki iş ortaklarımız, Kişisel
                            Verileri Koruma Kurumu, Kişisel Verileri Koruma Kurulu ve bu başvuruya ilişkin süreçleri
                            yürüten diğer adli makamlarla paylaşılabilir.</p>
                        <p>2. <strong>BAŞVURU USULÜ</strong></p>
                        <p> İmzalı ve yazılı olarak veya kayıtlı elektronik posta (KEP) adresi, güvenli elektronik imza,
                            mobil imza ya da tarafınızdan Şirketimize bu başvuru formunu doldurmadan önce bildirdiğiniz
                            ve sistemimizde kayıtlı bulunan elektronik posta adresinizi kullanmak suretiyle Şirketimize
                            şahsen başvuruda bulunabilirsiniz. Talebinizin mahiyetine ve başvuru yönteminize göre Şirket
                            tarafından başvurunun size ait olup olmadığının belirlenmesi ve böylece kişilik haklarınızı
                            koruyabilmek amacıyla kimlik doğrulamaya yönelik ek bilgi (kayıtlı telefonunuza mesaj
                            gönderilmesi, aranmanız gibi) istenebilir. Örneğin Şirkette kayıtlı olan e-posta adresiniz
                            aracılığıyla başvuru yapmanız halinde Şirkette kayıtlı başka bir iletişim yöntemini
                            kullanarak size ulaşabilir ve başvurunun size ait olup olmadığının teyidini
                            isteyebiliriz.</p>
                        <p> İmzalı ve yazılı başvuru yapmanız halinde bu başvurunun tarafımıza tebliğ edilmesi
                            gerekmektedir. Yaptığınız yazılı başvuruyu bizlere tebliğ edildiği tarihten itibaren mümkün
                            olan en kısa sürede ve en geç 30 gün içerisinde yanıtlandıracağız. Diğer yöntemlerle yapılan
                            başvurularınızda, başvurunuzun tarafımıza ulaştığı tarih başvuru tarihidir. Tarafımıza
                            sunduğunuz bilgi ve belgelerin eksik olması veyahut anlaşılamaz olması halinde başvurunuzu
                            netleştirmek amacıyla sizlerle iletişime geçeceğiz.</p>
                        <p>3. <strong>BAŞVURUNUZA CEVAP USULÜ</strong></p>
                        <p> Şirket tarafından talebinize cevabımızı yazılı olarak veya elektronik ortamda iletebiliriz.
                            Her halükârda ilgili mevzuat çerçevesinde aşağıdaki bilgileriniz, başvurunuza verdiğimiz
                            cevap metninde yer alacaktır:</p>
                        <ul>
                            <li>Adınız ve soyadınız</li>
                            <li>Türkiye Cumhuriyeti vatandaşıysanız T.C. kimlik numaranız</li>
                            <li> Yabancı iseniz uyruğunuz, pasaport numaranız veya varsa kimlik numaranız</li>
                            <li>Tebligata esas yerleşim yeriniz veya iş yeri adresiniz</li>
                            <li>Varsa bildirime esas elektronik posta adresiniz</li>
                            <li>Telefon ve varsa faks numaranız</li>
                        </ul>
                        <p> Başvurunuza yazılı cevap hazırlamamız halinde, cevap metnimiz on sayfayı aşarsa, aşan her
                            sayfa için tarafınızdan Veri Sorumlusuna Başvuru Usul Ve Esasları Hakkında Tebliğ Madde 7’de
                            belirtilen işlem ücreti talep edilir.</p>
                        <p> 4. <strong> KİŞİSEL VERİ SAHİBİNİN (VE VARSA TEMSİLCİSİNİN) KİMLİK VE İLETİŞİM
                                BİLGİLERİ </strong></p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="168"><p><strong>Adı - Soyadı:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong>Kanuni Temsilci Adı-Soyadı:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> T.C. Kimlik No (Yabancı iseniz uyruk, pasaport no veya
                                            kimlik numarası): </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Kanuni Temsilci T.C. Kimlik No (Yabancı iseniz uyruk,
                                            pasaport no veya kimlik numarası): </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong>Telefon Numarası:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Tebligata esas yerleşim yeri veya iş yeri adresi: </strong>
                                    </p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Varsa bildirime esas E-posta veya KEP Adresi, telefon
                                            numarası ve faks numarası: </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>5. <strong>VERİ SORUMLUSUNA DAİR BİLGİ</strong></p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="168"><p><strong>Şirketinizle Olan İlişkim</strong></p></td>
                                <td width="483" colspan="2"></td>
                            </tr>
                            <tr>
                                <td width="344" colspan="2"><p>☐ Aday</p></td>
                                <td width="307"><p>☐ İşveren Müşteri Temsilcisi/Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td width="344" colspan="2"><p>☐ Gerçek Kişi İşveren Müşteri</p></td>
                                <td width="307"><p>☐ Tedarikçi Firma Temsilcisi/Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td width="344" colspan="2"><p>☐ Çalışan</p>
                                    <p>İlgili Birim:………………….………………………………………</p></td>
                                <td width="307"><p>☐ Eski Çalışan</p>
                                    <p><em>Çalıştığım Yıllar : ………………………………………….</em></p></td>
                            </tr>
                            <tr>
                                <td width="344" colspan="2"><p>☐ Çalışan Adayı</p>
                                    <p><em>Tarih : …………………………………………………………………..</em></p></td>
                                <td width="307"><p>☐ Üçüncü Kişi Firma Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td width="344" colspan="2"><p>☐ Diğer: ……………………………………………………..</p></td>
                                <td width="307"></td>
                            </tr>
                            <tr>
                                <td width="210"></td>
                                <td width="191"></td>
                                <td width="340"></td>
                            </tr>
                            </tbody>
                        </table>
                        <p> 6. <strong>KİŞİSEL VERİLERİN KORUNMASI KANUNU KAPSAMINDAKİ TALEBİM</strong></p>
                        <p>o <strong>Talebim</strong></p>
                        <ul>
                            <li><strong>Talep konusuna dair bilgi ve belgeler</strong></li>
                        </ul>
                        <p> Hangi bilgi ve belgeler olduğunu burada belirterek başvurunuzla birlikte
                            gönderebilirsiniz.</p>
                        <p>7. <strong>VERİ SAHİBİ/KANUNİ TEMSİLCİ OLARAK BEYANIM</strong></p>
                        <p> Bu başvuruyu Veri Sahibi veya Veri Sahibinin kanuni temsilcisi sıfatıyla kanunen yapmaya
                            yetkili olduğumu, başvuruda yer alan bilgi ve belgelerin güncel ve doğru olduğunu, hukuka
                            aykırı, yanlış ve yanıltıcı hiçbir bilgi sağlamadığımı kabul ve beyan ederim.</p>
                        <p> Yetkisiz bir başvuru yapmam halinde başvurum üzerine kanuna aykırı veya haksız bir şekilde
                            kişisel verilere dair bilgilerin paylaşılmasına neden olabileceğimi ve bundan dolayı
                            Şirketinizin ve ilgili kişilerin doğabilecek zararlarından sorumlu olacağımı kabul
                            ederim.</p>
                        <p> Çocukları veya vasisi oldukları kişiler adına başvuru yapanlardan nüfus cüzdanı ve tasdikli
                            vesayet kararı gerekmektedir.</p>
                        <p><strong> Başvurunuzu yazılı usulle yapacaksınız aşağıdaki bölümü ayrıca doldurunuz: </strong>
                        </p>
                        <p>Kişisel Veri Sahibi / Başkası Adına Başvuruda Bulunan Kişi</p>
                        <p>Adı Soyadı :</p>
                        <p>İmza :</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-danger font-weight-bold" id="confirmation">Onaylıyorum</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="serviceAgreement1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content" style="width: 750px; margin-left: -140px;">
                <div class="modal-header">
                    <button type="button" class="close" id="close1" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jsx-97634155"><p><strong>KİŞİSEL VERİLERİN İŞLENMESİ HAKKINDA ADAY AÇIK RIZA
                                METNİ</strong></p>
                        <p>Burada vereceğiniz hesabınızda belirteceğiniz rıza, kişisel verilerinizin işlenmesi ve&nbsp;
                            hizmetin ifa edilebilmesi amacıyla yalnızca ilgili verilerinizin yurt dışında yerleşik
                            anlaşmalı servis sağlayıcılarımıza aktarılmasına ilişkindir.</p>
                        <p>Hangi kişisel verilerinizi ne amaçlarla işlediğimize dair detaylı bilgilere &nbsp;<a
                                href="https://isinolsun.com/aday-uyelik-aydinlatma-metni" target="_blank">Aday
                                Aydınlatma Metni’nden</a> ulaşabilirsiniz.</p>
                        <p><strong>HANGİ KİŞİSEL VERİLERİNİZİ İŞLİYORUZ?</strong></p>
                        <p>“İşin olsun” bir Kariyer.net markasıdır ve iş arayan üyelerimizle çalışan arayan üyelerimizi
                            aynı platformda birleştirerek istihdam yaratmayı amaçlayan bir platformudur. Bu amaçları
                            gerçekleştirebilmek ve bazı araştırmalar ve pazarlama faaliyetleri yaparak tüm üyelerimize
                            daha iyi hizmet verebilmek için zaman zaman kişisel verilerinizi işleyebilmekteyiz.</p>
                        <p><strong><u>Tarafımızca, bizimle paylaşmanız veya gerekli olması halinde, işlemeye konu
                                    olabilecek kişisel verileriniz aşağıdaki gibidir:</u></strong></p>
                        <ul>
                            <li>Görsel ve işitsel veri; Gerçek kişiye ait fotoğraf, ses kayıtları</li>
                            <li>Web sitesi/Uygulama Kullanım Verileri; Mesajlaşma seçeneğinin mevcut olması halinde
                                İşveren Müşteri ile Aday arasındaki yazışmalarda belirtebileceğiniz özel nitelikli
                                kişisel verileriniz
                            </li>
                            <li>Profilinizde manuel doldurulan alanlarda belirttiğiniz özel nitelikli kişisel
                                verileriniz
                            </li>
                            <li>İşveren Müşteriler’in adaylardan talep edebileceği ek bilgiler (bu ek bilgiler,
                                engelilik durumu, dernek, vakıf, sendika, siyasi parti üyeliklerine ait bilgiler, dini
                                veya felsefi görüşünüze, etnik kökeninize ve ırkınıza ait veya o konuda kanaat
                                oluşturabilecek bilgiler olabilir),
                            </li>
                            <li>Sağlık verisi; Engellilik durumu, engel yüzdesi, engel kategorisi</li>
                            <li>Destek hattında otomatik ses kayıt sistemine kaydedilen, sizin belirttiğiniz özel
                                nitelikli kişisel veriler
                            </li>
                        </ul>
                        <p><strong>KİŞİSEL VERİLERİNİZİ HANGİ AMAÇLARLA İŞLİYORUZ?</strong></p>
                        <p>“<u>Kişisel verilerimin Açık Rıza Metni'nde belirtilen şekilde işlenmesine onay veriyorum</u>”
                            onay kutucuğunu işaretleyerek hem ilgili sekmedeki özel nitelikli verilerinizi hem de bu
                            Açık Rıza Metni’nde belirtilmeyen ancak bizimle paylaşmayı kendiniz tercih ettiğinizkişisel
                            verilerinizi aşağıdaki amaçlarla işlememiz için tarafımıza açık rıza vermektesiniz:</p>
                        <ul>
                            <li>İstihdam yaratmak ve işe alım sürecinize destek vermek</li>
                            <li>Size iş bulmak, işveren müşterilerimize de doğru adaya ulaşabilmeleri amacıyla
                                paylaştığınız kişisel verilerinizden yararlanarak işveren müşteri ilanları ile
                                eşleştirme yapmak
                            </li>
                            <li>Başvuru yaptığınız işverenlere, üyelik/profil bilgilerini aktarmak</li>
                            <li>Sizden gelen çağrıları karşılamak ve destek ihtiyaçlarınıza cevap vermek</li>
                            <li>Verdiğimiz hizmetlere ilişkin bir şikâyet olduğu takdirde söz konusu şikâyeti
                                sonuçlandırmak
                            </li>
                            <li>Uygulama üzerinden ileti göndermek</li>
                            <li>Size verdiğimiz hizmetin kalitesini arttırmak ve kalite kontrolünü sağlamak</li>
                            <li>Başvuru yapmanıza yardımcı olmak adına toplu e-posta ve SMS göndermek</li>
                            <li>Güncel ve Ar-Ge aşamasındaki uygulamalarımızın geliştirmek ve yönetimi sürecinde ürünü
                                pazarlamak
                            </li>
                            <li>Şirket içerisinde kullanılan yazılımları iç ve dış kaynak kullanarak geliştirmek</li>
                            <li>Yalnız gerekli olduğunda, yurt içindeki ve yurt dışındaki işveren müşterilerimize destek
                                vermek
                            </li>
                            <li>Hukuka ve usule uygun savcılık talepleri ve mahkeme kararları gibi hukuki talepler
                                aracılığıyla tarafımızdan kişisel verilerinizin paylaşılması istendiğinde ve mevzuatta
                                düzenlenmiş yasal bildirimler gereği kişisel verilerinizi paylaşma yükümlülüğümüz
                                bulunmaktadır.
                            </li>
                            <li>Ayrıca kişisel verileriniz bizim de taraf olduğumuz bir uyuşmazlığa konu olduğu takdirde
                                savunma hakkımızı kullanabilmemiz için gerekli olan avukat, bilirkişi, mahkeme gibi
                                mecralarla ve kişilerle kişisel verilerinizi paylaşmamız gerekebilir. Bu hukuki
                                yükümlülüklerimizi yerine getirmek ve savunma hakkımızı kullanabilmek amacıyla kişisel
                                verilerinizi işleyebiliriz.
                            </li>
                            <li>Şirket’e başvurmanız halinde Şirket ile aranızda kurulacak aday çalışan adayı-işveren
                                adayı hukuki ilişkisi çerçevesinde iş sözleşmesinin kurulması için gerekli olması
                                nedeniyle&nbsp;iş başvurunuzu değerlendirmek için aşağıdaki amaçlarla verilerinizi
                                işleyebiliyoruz:
                            </li>
                            <ul>
                                <li>Yeni eleman istihdam edilmesi, adayları inceleme ve istihdam edilecek yeni adayın
                                    tespit edilmesi,
                                </li>
                                <li>Pozisyonla ne kadar örtüştüğünüzün doğrulanması ve ileriye dönük teyit için profil
                                    bilgilerinizin kaydedilmesi
                                </li>
                            </ul>
                        </ul>
                        <p><strong>KİŞİSEL VERİLERİNİZİ NERELERE AKTARIYORUZ?</strong></p>
                        <p>Size verdiğimiz hizmeti en iyi şekilde yerine getirebilmek için sürekli gelişmeye ve
                            ilerlemeye gayret ediyoruz. Bunun için kişisel verilerinizi aşağıdaki şekilde yurt içindeki
                            ve yurt dışındaki üçüncü kişilere aktarabilmekteyiz:</p>
                        <ul>
                            <li>Kampanyalarımızdan ve promosyonlarımızdan haberdar olmayı tercih etmeniz halinde size
                                toplu e-posta SMS ve uygulama iletisi gönderebilmek amacıyla iletişim bilgilerinizi
                                içeren kişisel verilerinizi yurt içinde ve/veya yurt dışında veri sorumlusu/veri işleyen
                                ilişkili içerisinde anlaşmalı olduğumuz ilgili hizmeti veren tedarikçilere aktarıyoruz.
                            </li>
                            <li>Çerez Politikası&nbsp;çerçevesinde toplanan kişisel verileriniz, size ve diğer üye ve
                                müşterilerimize daha iyi hizmet verebilmek için topladığımız site ve uygulama
                                içerisindeki kullanıcı hareketi verileri (nereye tıklandı, ne kadar kalındı vs. gibi),
                                bu gibi analizler yaparak iş geliştirme sağlayan yurt dışında yerleşik şirketlere
                                aktarabiliyoruz.
                            </li>
                            <li>Hizmetin ifası için destek aldığımız ve veri sorumlusu/veri işleyen ilişkisi içerisinde
                                bulunduğumuz yurt içinde ve/veya yurt dışında yerleşik servis sağlayıcılarımıza yalnızca
                                ilgili Kişisel verilerinizi birlikte çalıştığımız ve veri sorumlusu/veri işleyen
                                ilişkisi içerisinde bulunduğumuz firmalara aktarıyoruz.
                            </li>
                            <li>Size istihdam hizmetimizi sağlayabilmek adına hesabınızda yer alan <strong>özel
                                    nitelikli kişisel verileriniz de dahil olmak üzere profilinizde yer alan kişisel
                                    verilerinizi&nbsp;</strong> başvurduğunuz yurt içi ve/veya yurt dışı merkezli olan
                                üye işveren(ler)e aktarııyoruz.
                            </li>
                            <li>Herhangi bir ihtilafta savunma hakkımızı kullanabilmek amacıyla&nbsp;<strong>özel
                                    nitelikli kişisel verileriniz de dahil olmak üzere bütün kişisel
                                    verilerinizi</strong>avukatlarımıza veya hukuki danışmanlarımıza aktarıyoruz.
                            </li>
                            <li>Herhangi bir tarihte başvurduğunuz ilan ile ilan sahibi işveren müşteriye aktarılan
                                normal ve/veya özel nitelikli kişisel verilerinin silinmesini, yok edilmesini ve/veya
                                anonim hale getirilmesini isterseniz bu talebinizi doğrudan ilan sahibi firmaya veya
                                Şirket’ e iletmeniz gerekir.
                            </li>
                        </ul>
                        <p>&nbsp;</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-danger font-weight-bold" id="confirmation1">Onaylıyorum</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="serviceAgreementMobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" id="closemobile">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jsx-97634155"><p><strong>İŞİN OLSUN PLATFORMU ADAY HİZMET SÖZLEŞMESİ</strong></p>
                        <p> İşbu Sözleşme, halihazırda isinolsun.com veya İşin Olsun cep telefonu uygulaması üzerinde
                            yer alan platform ("Platform") aracılığı ile verilen istihdama yönelik hizmetlerle, bu
                            hizmetler için Platform içinde yapılan veri toplama ve Platform dışında yapılan araştırma ve
                            pazarlama aktiviteleri de dahil olmak üzere bu Sözleşme altında sunulduğu ifade edilen diğer
                            tüm hizmetler ("Hizmetler") için geçerlidir.</p>
                        <p> "Aday", çalışan arayan ve Kariyer.net platform'unun kullanımı için aktif sözleşmesi bulunan
                            kayıtlı kullanıcıları ise "İşveren Müşteri" olarak adlandırılır. İşbu Sözleşme Aday için
                            geçerlidir.</p>
                        <p><strong>TANIMLAR</strong></p>
                        <p> Aday; Hizmet Sözleşmesini onaylayarak, iş ilanına başvuru yapma,iş ilanı için firmayı arama
                            gibi edimlerde bulunan üyelerini</p>
                        <p> İşveren; Kariyer.net platform'unun kullanımı için aktif sözleşmesi bulunan ve hizmeti iş
                            ilanı yayımlama, başvuru toplama, personel istihdam etmek üzere kullanan üyeleri ifade
                            eder.</p>
                        <p><strong>PLATFORM KULLANIMINA İLİŞKİN HÜKÜMLER</strong></p>
                        <p> 1. Aday kullanıcılar üyelik gerçekleştirmeden tüm ilanları görüntüleyebilir, detaylarına
                            ulaşabilir ve inceleyebilirler ancak başvurmak veya işvereni aramak için üyelik adımını
                            tamamlamaları gerekir.</p>
                        <p> 2. Üyelik adımında adayın GSM numarası, adı soyadı ve mesleğinin girilmesi ve adresin
                            belirtilmesi zorunludur. İsim, soy isim,meslek ve adres bilgileri, işverenin kişiyi
                            değerlendirebilmesi için verilen zorunlu bilgilerdir. GSM numarası ise tek kullanımlık şifre
                            yöntemi ile doğrulama kodu iletilerek geçilen güvenlik adımı için zorunludur. Bu doğrulama
                            ile hem adayın hem de diğer kişilerin güvenliği sağlanmaktadır.</p>
                        <p> 3. İlk üyelik adımı geçildikten ve hesaba giriş yapıldıktan sonra opsiyonel olan iş
                            deneyimleri, yaş, adres, askerlik durumu gibi bilgileri aday istediği takdirde profiline
                            kaydedebilir.</p>
                        <p> 4. Üyelik sırasında veya sonrasında opsiyonel olarak aday tarafından profile fotoğraf
                            eklenmesi, değiştirilmesi ve kaldırılması yapılabilir. Bunun yanında, kişisel verilerinin
                            işlenmesi için onay vermemiş olan adayın, profiline fotoğraf eklemesi mümkün olmamaktadır.
                            Bunun sebebi, fotoğraf gibi biyometrik bir veri yüklenmesi için, ilgili mevzuata göre ilgili
                            kişinin (adayın) özel nitelikli kişisel verilerinin işlenmesine onay vermesi
                            gerektiğidir.</p>
                        <p> 5. Aday, ilana başvurmak için işverenin ilan açarken yaptığı seçime göre ilgilendiği ilan
                            için ilan kartında bulunan “Teklif Ver” butonu ile belirlediği teklifi ve teklif
                            açıklamasını belirtebilir ve ilana başvurabilir. İsteğe bağlı olarak iş ile ilgili
                            olarak“Ara” butonu ile İşvereni arayabilir. “Ara” seçeneği ile başvurduysa, kullanmakta
                            olduğu operatör üzerinden ücretlendirilmek sureti ile kendi tarifesi üzerinden işvereni
                            arayabilir. Söz konusu arama dolayısı ile adayın telefon faturasına yansıtılacak bedellerde
                            <a href="https://www.kariyer.net/">Kariyer.net</a>’in herhangi bir kontrolü, müdahalesi ve
                            sorumluluğu yoktur. Aday arama yaptığı anda söz konusu aramanın veya kullanılan internet
                            erişiminin kendi operatör tarifesi üzerinden ücretlendirileceğini bilmekte ve kabul
                            etmektedir.</p>
                        <p> 6. <a href="https://www.kariyer.net/">Kariyer.net</a><u> </u>sadece adayın işverene
                            ulaşmasını veya işverenin adaya ulaşmasını sağlamak amacıyla bu imkanları sağlamaktadır.
                            Aday, işbu Hizmet Sözleşmesi’ ni onaylayarak, arama veya mesajlaşma esnasında ve/veya
                            sonrasındaki işlemlerden, olaylardan ve kişiler arasında oluşabilecek sorunlardan kişiler
                            kendilerinin sorumlu olduğunu bilmekte ve kabul etmektedir.</p>
                        <p> 7. İşvereni mobil uygulama üzerinden arayan veya işveren tarafından uygulamadaki mesajlaşma
                            özelliği üzerinden ulaşılan aday, işveren ile arasında geçecek telefon görüşmesinin ve/veya
                            mesajlaşmaların, sonrasında gerçekleşebilecek yüz yüze veya online görüşmelerin içeriğinden
                            ve/veya işveren ile arasında gelişebilecek herhangi bir olaydan <a
                                href="https://www.kariyer.net/">Kariyer.net</a>’in sorumluluğu olmadığını kabul, beyan
                            ve taahhüt etmektedir. İşverenin ve/veya 3. kişilerin/kurumların söz konusu telefon
                            görüşmesi ve/veya mesajlaşma ve sonrasında gelişebilecek olaylarla ilgili her türlü
                            talebinden aday sorumludur.</p>
                        <p> 8. Aday, ilanına başvurduğu işveren ile uygulama üzerinden yapmış olduğu kayda alınan
                            mesajlaşmaların Kariyer.net tarafından 2 yıl süre ile saklanacağını ve şikayetlerin veya
                            taleplerin değerlendirilebilmesi için Kariyer.net ve çalışanları tarafından
                            görüntülenebileceğini bilmekte ve işbu Sözleşmenin imzalanması ile kabul etmekte ve onay
                            vermektedir. Aday ile Müşteri arasındaki mesajlaşma içeriğinden, mesajlaşma özelliğinin işbu
                            Sözleşme amacı ve/veya istihdam amacı dışında kullanılmasından Kariyer.net’in sorumlu
                            olmadığını Aday kabul, beyan ve taahhüt eder. Mesajlaşma ve içeriği ve sair nedenlerle 3.
                            kişilerin/kurumların Kariyer.net’e iletecekleri her türlü talepten aday ve/veya işveren
                            sorumludur.</p>
                        <p> 9. Bu nedenle <a href="https://www.kariyer.net/">Kariyer.net</a>’in herhangi bir ödeme
                            yapması gerektiği takdirde <a href="https://www.kariyer.net/">Kariyer.net</a> ödediği
                            miktarı adaya rücu edebilecektir. Aday bu hususu peşinen kabul eder.</p>
                        <p> 10. Aday, mobil uygulama üzerinden arama yaptığı anda ya da başvuru yöntemi ile başvuru
                            gerçekleştirdiğinde ve işveren adayı arağında telefon numarasının aradığı kişi/kurum
                            tarafından görüntüleneceğini, bilmekte ve kabul etmektedir. Aday, arama yaptıktan sonraki
                            tüm sorumluluğu bizzat üstlenmektedir.</p>
                        <p> 11. Aday iş ilanına başvuru için “ara” butonuna bastığı anda kullanmakta olduğu cihazın ID
                            numarası <a href="https://www.kariyer.net/">Kariyer.net</a> tarafından İşin Olsun mobil
                            uygulamasının işlevselliğini artırmak ve uygulamayı geliştirmek amaçlarıyla işlenir.</p>
                        <p> 12. Aday, konum bilgisine izin verdiği takdirde İşin Olsun mobil uygulaması, adayın konumuna
                            en yakın yerdeki iş fırsatlarını uygulama içerisinde listeler. Bu sebeple <a
                                href="https://www.kariyer.net/">Kariyer.net</a> adaydan konum bilgisi iznini
                            istemektedir. Aday adres bilgisini profiline kaydettiğinde ve işlenmesi için izni verdiğinde
                            ise “Evime Yakın” sekmesini kullanabilir ve ilanların bulunduğu işyerleriyle arasındaki
                            mesafeyi görebilecektir.</p>
                        <p> 13. Aday, ilanına başvuruda bulunduğu işverenin, kendisi ile uygulama içerisindeki
                            mesajlaşma özelliği üzerinden iletişime geçebileceğini, aday ile işveren arasındaki
                            mesajlaşmaların kaydedileceğini bilmekte ve bunu kabul etmekte ve onay vermektedir. Aday
                            uygulama içerisinde ilanına başvuruda bulunduğu işvereni mesaj atmaması için engelleyebilir
                            veya işveren tarafından engellenebilir.</p>
                        <p> 14. Aday, ilanına başvurduğu işveren ile uygulama üzerinden yapmış olduğu kayda alınan
                            mesajlaşmaların <a href="https://www.kariyer.net/">Kariyer.net</a> tarafından, ilgili yasal
                            mevzuat gereği 2 yıl süre ile saklanacağını ve şikayetlerin veya taleplerin
                            değerlendirilebilmesi için <a href="https://www.kariyer.net/">Kariyer.net</a> ve çalışanları
                            tarafından görüntülenebileceğini bilmekte ve işbu Sözleşmenin kabulu ile onay vermektedir.
                            Aday ile Müşteri arasındaki mesajlaşma içeriğinden, mesajlaşma özelliğinin işbu Sözleşme
                            amacı ve/veya istihdam amacı dışında kullanılmasından <a href="https://www.kariyer.net/">Kariyer.net</a>’in
                            hiçbir müdahalesi olmadığını day kabul, beyan ve taahhüt eder. Mesajlaşma ve içeriği ve sair
                            nedenlerle 3. kişilerin/kurumların <a href="https://www.kariyer.net/">Kariyer.net</a>’e
                            iletecekleri her türlü talepten aday ve/veya işveren sorumludur.</p>
                        <p> 15. Şirket'in aday tarafından Platform'a kayıt formunda belirtilen veya daha sonra kendisi
                            tarafından güncellenen iletişim adresleri üzerinden kullanıcıya iletişim, yeni ürünlerle,
                            sistem geliştirmeleri ile ilgili bildirim ve diğer amaçlarla ulaşma ve e-ileti gönderme
                            hakkı bulunmaktadır. Aday işbu Sözleşme'yi kabul etmekle aksine bir bildirimi olmadığı
                            müddetçe Şirket'in kendisine yönelik yukarıda belirtilen iletişim faaliyetlerinde
                            bulunabileceğini kabul ve beyan etmektedir. Aday, hesap ayarları üzerinden veya kendisine
                            gönderilen e-postada yer alan "Listeden çıkmak istiyorum" bağlantısını kullanarak tek tıkla
                            e-posta listesinden çıkabilir.</p>
                        <p> 16. Aday, yukarıda belirtilen kişisel verilerinin <a href="https://www.kariyer.net/">Kariyer.net</a>
                            tarafından işbu Üyelik Sözleşmesi ve Aday Üyelik Aydınlatma Metni ile ilgili mevzuat
                            hükümlerinden kaynaklanan yükümlülüklerinin ifası ve Aday’ın ilgili işverenlere ulaşmasını
                            ve/veya işverenin adaya ulaşmasının sağlanması ve/veya şikayet ve taleplerin
                            değerlendirilmesini sağlama amaçlarıyla işleneceğini bilmekte ve kabul etmektedir.</p>
                        <p> 17. İşin Olsun <a href="https://www.kariyer.net/">Kariyer.net</a> Elektronik Yayıncılık ve
                            İletişim Hizmetleri A.Ş.’ye (“ <a href="https://www.kariyer.net/">Kariyer.net</a>”) ait bir
                            mobil uygulamadır. İşin Olsun mobil uygulaması üzerinden işveren tarafından yayınlanan ilana
                            “ara” butonunu tıklamak ve işverenin ilanda belirtmiş olduğu telefon numarasını aramak
                            ve/veya işverenin ilanına başvuru bildirisi bırakmak ve/veya işveren tarafından uygulama
                            içindeki mesajlaşma özelliği üzerinden iletişime geçen aday, işbu Üyelik Sözleşmesi’ ni
                            kabul etmektedir.</p>
                        <p> 18. Aday, üyeliğini sona erdirmeyi ve/veya kişisel verilerinin imhasını talep etmesi halinde
                            EK-1’de bulunan formu doldurarak eksiksiz olarak doldurmak ve kimliğini ispatlamak kaydıyla
                            bu talebini <a href="mailto:adaydestek@kariyer.net">adaydestek@kariyer.net</a> mail adresine
                            iletir. Kariyer.net bu talebi aldığında kişinin kimliğini doğrulamak amacıyla, adayın
                            Platform’da kayıtlı telefon numarasına doğrulama kodu gönderme, adaya Platformda kayıtlı
                            telefon numarası üzerinden ulaşarak kimliğini doğrulamak gibi aksiyonlar alabilir. Aday,
                            işbu Hizmet Sözleşmesi’ni onaylamak kaydıyla, bu hususu bildiğini kabul, beyan ve taahhüt
                            eder.</p>
                        <p><strong>EK – I</strong></p>
                        <p><strong> KVKK KAPSAMINDA BAŞVURU HAKININ KULLANIMI İÇİN BAŞVURU FORMU </strong></p>
                        <p> Bu başvuru formu Veri Sahibi olarak Kişisel Verilerin Korunması Kanunu Madde 11 kapsamında
                            yer alan haklarınızı kullanabilmeniz amacıyla hazırlanmıştır.</p>
                        <p>1. <strong>AYDINLATMA</strong></p>
                        <p> Başvurunuz ve başvurunuza verdiğimiz cevabımız, savunma hakkımızı kullanmak veya
                            başvuruların organizasyonu veya yönetimi amacıyla veri kayıt ortamımızda saklanabilir ve
                            işlenebilir, bu amaçlarla avukatlarımız, veri işleyen durumundaki iş ortaklarımız, Kişisel
                            Verileri Koruma Kurumu, Kişisel Verileri Koruma Kurulu ve bu başvuruya ilişkin süreçleri
                            yürüten diğer adli makamlarla paylaşılabilir.</p>
                        <p>2. <strong>BAŞVURU USULÜ</strong></p>
                        <p> İmzalı ve yazılı olarak veya kayıtlı elektronik posta (KEP) adresi, güvenli elektronik imza,
                            mobil imza ya da tarafınızdan Şirketimize bu başvuru formunu doldurmadan önce bildirdiğiniz
                            ve sistemimizde kayıtlı bulunan elektronik posta adresinizi kullanmak suretiyle Şirketimize
                            şahsen başvuruda bulunabilirsiniz. Talebinizin mahiyetine ve başvuru yönteminize göre Şirket
                            tarafından başvurunun size ait olup olmadığının belirlenmesi ve böylece kişilik haklarınızı
                            koruyabilmek amacıyla kimlik doğrulamaya yönelik ek bilgi (kayıtlı telefonunuza mesaj
                            gönderilmesi, aranmanız gibi) istenebilir. Örneğin Şirkette kayıtlı olan e-posta adresiniz
                            aracılığıyla başvuru yapmanız halinde Şirkette kayıtlı başka bir iletişim yöntemini
                            kullanarak size ulaşabilir ve başvurunun size ait olup olmadığının teyidini
                            isteyebiliriz.</p>
                        <p> İmzalı ve yazılı başvuru yapmanız halinde bu başvurunun tarafımıza tebliğ edilmesi
                            gerekmektedir. Yaptığınız yazılı başvuruyu bizlere tebliğ edildiği tarihten itibaren mümkün
                            olan en kısa sürede ve en geç 30 gün içerisinde yanıtlandıracağız. Diğer yöntemlerle yapılan
                            başvurularınızda, başvurunuzun tarafımıza ulaştığı tarih başvuru tarihidir. Tarafımıza
                            sunduğunuz bilgi ve belgelerin eksik olması veyahut anlaşılamaz olması halinde başvurunuzu
                            netleştirmek amacıyla sizlerle iletişime geçeceğiz.</p>
                        <p>3. <strong>BAŞVURUNUZA CEVAP USULÜ</strong></p>
                        <p> Şirket tarafından talebinize cevabımızı yazılı olarak veya elektronik ortamda iletebiliriz.
                            Her halükârda ilgili mevzuat çerçevesinde aşağıdaki bilgileriniz, başvurunuza verdiğimiz
                            cevap metninde yer alacaktır:</p>
                        <ul>
                            <li>Adınız ve soyadınız</li>
                            <li>Türkiye Cumhuriyeti vatandaşıysanız T.C. kimlik numaranız</li>
                            <li> Yabancı iseniz uyruğunuz, pasaport numaranız veya varsa kimlik numaranız</li>
                            <li>Tebligata esas yerleşim yeriniz veya iş yeri adresiniz</li>
                            <li>Varsa bildirime esas elektronik posta adresiniz</li>
                            <li>Telefon ve varsa faks numaranız</li>
                        </ul>
                        <p> Başvurunuza yazılı cevap hazırlamamız halinde, cevap metnimiz on sayfayı aşarsa, aşan her
                            sayfa için tarafınızdan Veri Sorumlusuna Başvuru Usul Ve Esasları Hakkında Tebliğ Madde 7’de
                            belirtilen işlem ücreti talep edilir.</p>
                        <p> 4. <strong> KİŞİSEL VERİ SAHİBİNİN (VE VARSA TEMSİLCİSİNİN) KİMLİK VE İLETİŞİM
                                BİLGİLERİ </strong></p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td width="168"><p><strong>Adı - Soyadı:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong>Kanuni Temsilci Adı-Soyadı:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> T.C. Kimlik No (Yabancı iseniz uyruk, pasaport no veya
                                            kimlik numarası): </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Kanuni Temsilci T.C. Kimlik No (Yabancı iseniz uyruk,
                                            pasaport no veya kimlik numarası): </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong>Telefon Numarası:</strong></p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Tebligata esas yerleşim yeri veya iş yeri adresi: </strong>
                                    </p></td>
                                <td width="483"></td>
                            </tr>
                            <tr>
                                <td width="168"><p><strong> Varsa bildirime esas E-posta veya KEP Adresi, telefon
                                            numarası ve faks numarası: </strong></p></td>
                                <td width="483"></td>
                            </tr>
                            </tbody>
                        </table>
                        <p>5. <strong>VERİ SORUMLUSUNA DAİR BİLGİ</strong></p>
                        <table class="table">
                            <tbody>
                            <tr>
                                <td ><p><strong>Şirketinizle Olan İlişkim</strong></p></td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td ><p>☐ Aday</p></td>
                                <td ><p>☐ İşveren Müşteri Temsilcisi/Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td ><p>☐ Gerçek Kişi İşveren Müşteri</p></td>
                                <td ><p>☐ Tedarikçi Firma Temsilcisi/Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td ><p>☐ Çalışan</p>
                                    <p>İlgili Birim:………………….………………………………………</p></td>
                                <td><p>☐ Eski Çalışan</p>
                                    <p><em>Çalıştığım Yıllar : ………………………………………….</em></p></td>
                            </tr>
                            <tr>
                                <td><p>☐ Çalışan Adayı</p>
                                    <p><em>Tarih : …………………………………………………………………..</em></p></td>
                                <td ><p>☐ Üçüncü Kişi Firma Çalışanı</p>
                                    <p><em>Firma ve pozisyon:…………………………… ………</em></p></td>
                            </tr>
                            <tr>
                                <td><p>☐ Diğer: ……………………………………………………..</p></td>
                                <td ></td>
                            </tr>
                            <tr>
                                <td ></td>
                                <td ></td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>
                        <p> 6. <strong>KİŞİSEL VERİLERİN KORUNMASI KANUNU KAPSAMINDAKİ TALEBİM</strong></p>
                        <p>o <strong>Talebim</strong></p>
                        <ul>
                            <li><strong>Talep konusuna dair bilgi ve belgeler</strong></li>
                        </ul>
                        <p> Hangi bilgi ve belgeler olduğunu burada belirterek başvurunuzla birlikte
                            gönderebilirsiniz.</p>
                        <p>7. <strong>VERİ SAHİBİ/KANUNİ TEMSİLCİ OLARAK BEYANIM</strong></p>
                        <p> Bu başvuruyu Veri Sahibi veya Veri Sahibinin kanuni temsilcisi sıfatıyla kanunen yapmaya
                            yetkili olduğumu, başvuruda yer alan bilgi ve belgelerin güncel ve doğru olduğunu, hukuka
                            aykırı, yanlış ve yanıltıcı hiçbir bilgi sağlamadığımı kabul ve beyan ederim.</p>
                        <p> Yetkisiz bir başvuru yapmam halinde başvurum üzerine kanuna aykırı veya haksız bir şekilde
                            kişisel verilere dair bilgilerin paylaşılmasına neden olabileceğimi ve bundan dolayı
                            Şirketinizin ve ilgili kişilerin doğabilecek zararlarından sorumlu olacağımı kabul
                            ederim.</p>
                        <p> Çocukları veya vasisi oldukları kişiler adına başvuru yapanlardan nüfus cüzdanı ve tasdikli
                            vesayet kararı gerekmektedir.</p>
                        <p><strong> Başvurunuzu yazılı usulle yapacaksınız aşağıdaki bölümü ayrıca doldurunuz: </strong>
                        </p>
                        <p>Kişisel Veri Sahibi / Başkası Adına Başvuruda Bulunan Kişi</p>
                        <p>Adı Soyadı :</p>
                        <p>İmza :</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-danger font-weight-bold" id="confirmationmobile">Onaylıyorum</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="serviceAgreement1Mobile" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" id="close1mobile" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="jsx-97634155"><p><strong>KİŞİSEL VERİLERİN İŞLENMESİ HAKKINDA ADAY AÇIK RIZA
                                METNİ</strong></p>
                        <p>Burada vereceğiniz hesabınızda belirteceğiniz rıza, kişisel verilerinizin işlenmesi ve&nbsp;
                            hizmetin ifa edilebilmesi amacıyla yalnızca ilgili verilerinizin yurt dışında yerleşik
                            anlaşmalı servis sağlayıcılarımıza aktarılmasına ilişkindir.</p>
                        <p>Hangi kişisel verilerinizi ne amaçlarla işlediğimize dair detaylı bilgilere &nbsp;<a
                                href="https://isinolsun.com/aday-uyelik-aydinlatma-metni" target="_blank">Aday
                                Aydınlatma Metni’nden</a> ulaşabilirsiniz.</p>
                        <p><strong>HANGİ KİŞİSEL VERİLERİNİZİ İŞLİYORUZ?</strong></p>
                        <p>“İşin olsun” bir Kariyer.net markasıdır ve iş arayan üyelerimizle çalışan arayan üyelerimizi
                            aynı platformda birleştirerek istihdam yaratmayı amaçlayan bir platformudur. Bu amaçları
                            gerçekleştirebilmek ve bazı araştırmalar ve pazarlama faaliyetleri yaparak tüm üyelerimize
                            daha iyi hizmet verebilmek için zaman zaman kişisel verilerinizi işleyebilmekteyiz.</p>
                        <p><strong><u>Tarafımızca, bizimle paylaşmanız veya gerekli olması halinde, işlemeye konu
                                    olabilecek kişisel verileriniz aşağıdaki gibidir:</u></strong></p>
                        <ul>
                            <li>Görsel ve işitsel veri; Gerçek kişiye ait fotoğraf, ses kayıtları</li>
                            <li>Web sitesi/Uygulama Kullanım Verileri; Mesajlaşma seçeneğinin mevcut olması halinde
                                İşveren Müşteri ile Aday arasındaki yazışmalarda belirtebileceğiniz özel nitelikli
                                kişisel verileriniz
                            </li>
                            <li>Profilinizde manuel doldurulan alanlarda belirttiğiniz özel nitelikli kişisel
                                verileriniz
                            </li>
                            <li>İşveren Müşteriler’in adaylardan talep edebileceği ek bilgiler (bu ek bilgiler,
                                engelilik durumu, dernek, vakıf, sendika, siyasi parti üyeliklerine ait bilgiler, dini
                                veya felsefi görüşünüze, etnik kökeninize ve ırkınıza ait veya o konuda kanaat
                                oluşturabilecek bilgiler olabilir),
                            </li>
                            <li>Sağlık verisi; Engellilik durumu, engel yüzdesi, engel kategorisi</li>
                            <li>Destek hattında otomatik ses kayıt sistemine kaydedilen, sizin belirttiğiniz özel
                                nitelikli kişisel veriler
                            </li>
                        </ul>
                        <p><strong>KİŞİSEL VERİLERİNİZİ HANGİ AMAÇLARLA İŞLİYORUZ?</strong></p>
                        <p>“<u>Kişisel verilerimin Açık Rıza Metni'nde belirtilen şekilde işlenmesine onay veriyorum</u>”
                            onay kutucuğunu işaretleyerek hem ilgili sekmedeki özel nitelikli verilerinizi hem de bu
                            Açık Rıza Metni’nde belirtilmeyen ancak bizimle paylaşmayı kendiniz tercih ettiğinizkişisel
                            verilerinizi aşağıdaki amaçlarla işlememiz için tarafımıza açık rıza vermektesiniz:</p>
                        <ul>
                            <li>İstihdam yaratmak ve işe alım sürecinize destek vermek</li>
                            <li>Size iş bulmak, işveren müşterilerimize de doğru adaya ulaşabilmeleri amacıyla
                                paylaştığınız kişisel verilerinizden yararlanarak işveren müşteri ilanları ile
                                eşleştirme yapmak
                            </li>
                            <li>Başvuru yaptığınız işverenlere, üyelik/profil bilgilerini aktarmak</li>
                            <li>Sizden gelen çağrıları karşılamak ve destek ihtiyaçlarınıza cevap vermek</li>
                            <li>Verdiğimiz hizmetlere ilişkin bir şikâyet olduğu takdirde söz konusu şikâyeti
                                sonuçlandırmak
                            </li>
                            <li>Uygulama üzerinden ileti göndermek</li>
                            <li>Size verdiğimiz hizmetin kalitesini arttırmak ve kalite kontrolünü sağlamak</li>
                            <li>Başvuru yapmanıza yardımcı olmak adına toplu e-posta ve SMS göndermek</li>
                            <li>Güncel ve Ar-Ge aşamasındaki uygulamalarımızın geliştirmek ve yönetimi sürecinde ürünü
                                pazarlamak
                            </li>
                            <li>Şirket içerisinde kullanılan yazılımları iç ve dış kaynak kullanarak geliştirmek</li>
                            <li>Yalnız gerekli olduğunda, yurt içindeki ve yurt dışındaki işveren müşterilerimize destek
                                vermek
                            </li>
                            <li>Hukuka ve usule uygun savcılık talepleri ve mahkeme kararları gibi hukuki talepler
                                aracılığıyla tarafımızdan kişisel verilerinizin paylaşılması istendiğinde ve mevzuatta
                                düzenlenmiş yasal bildirimler gereği kişisel verilerinizi paylaşma yükümlülüğümüz
                                bulunmaktadır.
                            </li>
                            <li>Ayrıca kişisel verileriniz bizim de taraf olduğumuz bir uyuşmazlığa konu olduğu takdirde
                                savunma hakkımızı kullanabilmemiz için gerekli olan avukat, bilirkişi, mahkeme gibi
                                mecralarla ve kişilerle kişisel verilerinizi paylaşmamız gerekebilir. Bu hukuki
                                yükümlülüklerimizi yerine getirmek ve savunma hakkımızı kullanabilmek amacıyla kişisel
                                verilerinizi işleyebiliriz.
                            </li>
                            <li>Şirket’e başvurmanız halinde Şirket ile aranızda kurulacak aday çalışan adayı-işveren
                                adayı hukuki ilişkisi çerçevesinde iş sözleşmesinin kurulması için gerekli olması
                                nedeniyle&nbsp;iş başvurunuzu değerlendirmek için aşağıdaki amaçlarla verilerinizi
                                işleyebiliyoruz:
                            </li>
                            <ul>
                                <li>Yeni eleman istihdam edilmesi, adayları inceleme ve istihdam edilecek yeni adayın
                                    tespit edilmesi,
                                </li>
                                <li>Pozisyonla ne kadar örtüştüğünüzün doğrulanması ve ileriye dönük teyit için profil
                                    bilgilerinizin kaydedilmesi
                                </li>
                            </ul>
                        </ul>
                        <p><strong>KİŞİSEL VERİLERİNİZİ NERELERE AKTARIYORUZ?</strong></p>
                        <p>Size verdiğimiz hizmeti en iyi şekilde yerine getirebilmek için sürekli gelişmeye ve
                            ilerlemeye gayret ediyoruz. Bunun için kişisel verilerinizi aşağıdaki şekilde yurt içindeki
                            ve yurt dışındaki üçüncü kişilere aktarabilmekteyiz:</p>
                        <ul>
                            <li>Kampanyalarımızdan ve promosyonlarımızdan haberdar olmayı tercih etmeniz halinde size
                                toplu e-posta SMS ve uygulama iletisi gönderebilmek amacıyla iletişim bilgilerinizi
                                içeren kişisel verilerinizi yurt içinde ve/veya yurt dışında veri sorumlusu/veri işleyen
                                ilişkili içerisinde anlaşmalı olduğumuz ilgili hizmeti veren tedarikçilere aktarıyoruz.
                            </li>
                            <li>Çerez Politikası&nbsp;çerçevesinde toplanan kişisel verileriniz, size ve diğer üye ve
                                müşterilerimize daha iyi hizmet verebilmek için topladığımız site ve uygulama
                                içerisindeki kullanıcı hareketi verileri (nereye tıklandı, ne kadar kalındı vs. gibi),
                                bu gibi analizler yaparak iş geliştirme sağlayan yurt dışında yerleşik şirketlere
                                aktarabiliyoruz.
                            </li>
                            <li>Hizmetin ifası için destek aldığımız ve veri sorumlusu/veri işleyen ilişkisi içerisinde
                                bulunduğumuz yurt içinde ve/veya yurt dışında yerleşik servis sağlayıcılarımıza yalnızca
                                ilgili Kişisel verilerinizi birlikte çalıştığımız ve veri sorumlusu/veri işleyen
                                ilişkisi içerisinde bulunduğumuz firmalara aktarıyoruz.
                            </li>
                            <li>Size istihdam hizmetimizi sağlayabilmek adına hesabınızda yer alan <strong>özel
                                    nitelikli kişisel verileriniz de dahil olmak üzere profilinizde yer alan kişisel
                                    verilerinizi&nbsp;</strong> başvurduğunuz yurt içi ve/veya yurt dışı merkezli olan
                                üye işveren(ler)e aktarııyoruz.
                            </li>
                            <li>Herhangi bir ihtilafta savunma hakkımızı kullanabilmek amacıyla&nbsp;<strong>özel
                                    nitelikli kişisel verileriniz de dahil olmak üzere bütün kişisel
                                    verilerinizi</strong>avukatlarımıza veya hukuki danışmanlarımıza aktarıyoruz.
                            </li>
                            <li>Herhangi bir tarihte başvurduğunuz ilan ile ilan sahibi işveren müşteriye aktarılan
                                normal ve/veya özel nitelikli kişisel verilerinin silinmesini, yok edilmesini ve/veya
                                anonim hale getirilmesini isterseniz bu talebinizi doğrudan ilan sahibi firmaya veya
                                Şirket’ e iletmeniz gerekir.
                            </li>
                        </ul>
                        <p>&nbsp;</p></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger bg-danger font-weight-bold" id="confirmation1mobile">Onaylıyorum</button>
                </div>
            </div>
        </div>
    </div>


    <section class="overlape">
        <div class="block no-padding">
            <div data-velocity="-.1"
                 style="background: url(https://place-hold.it/1600x800) repeat scroll 50% 422.28px transparent;"
                 class="parallax scrolly-invisible no-parallax"></div>
            <div class="container fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="inner-header">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="block remove-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger1">

                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-3">
                    </div>
                    <div class="col-lg-6">
                        <div class="text-center" id="messageDanger2">

                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="account-popup-area signup-popup-box static">
                            <div class="account-popup">
                                <h3>Kayıt Ol</h3>
                                <span>
                                    Zaten bir hesabın mı var?
                                    <a style="color: blue" href="{{route('login')}}">Giriş yap</a>
                                </span>
                                <form method="post" action="{{route('register.custom')}}" autocomplete="off">
                                    @csrf
                                    <div class="cfield">
                                        <input name="name" type="text" placeholder="İsim Soyisim"/>
                                        <i class="la la-user"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="email" type="text" placeholder="Email" autocomplete="off"/>
                                        <i class="la la-envelope-o"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="password" type="password" placeholder="Şifre" required
                                               autocomplete="new-password"/>
                                        <i class="la la-key"></i>
                                    </div>
                                    <div class="cfield">
                                        <input name="phone" type="tel" placeholder="Telefon (53XXXXXXXX)" required/>
                                        <i class="la la-phone"></i>
                                    </div>
                                    <div class="select-user">
                                        <span id="jobSeeker" onclick="document.getElementById('role').value=1">İş Arayan</span>
                                        <span onclick="document.getElementById('role').value=2">İşveren</span>
                                        <input type="hidden" id="role" name="type" value="1">
                                    </div>
                                    <div class="row d-none d-lg-block">
                                        <div class="col-lg-12 mt-3">
                                            <p class="remember-label" style="font-size: 11.22px" id="cb3clear">
                                                <input type="checkbox"   id="cb3" required><label for="cb3">
                                                   <span class="font-weight-bold" id="serviceModalOnclick" data-toggle="modal" data-target="#serviceAgreement">Hizmet Sözleşmesini</span> Onaylıyorum</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 11.22px">
                                                <input type="checkbox"   id="cb2" required><label for="cb2">
                                                    İletişim bilgilerime e-ileti gönderilmesine izin veriyorum.</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 10.70px" id="cb1clear">
                                                <input type="checkbox"   id="cb1" required>
                                                <label for="cb1">
                                                    Verilerimin <span class="font-weight-bold" id="serviceModalOnclick1" data-toggle="modal" data-target="#serviceAgreement1">Açık Rıza Metninde</span> belirtilen şekilde işlenmesine onay veriyorum..</label>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="row d-lg-none">
                                        <div class="col-lg-12 mt-3">
                                            <p class="remember-label" style="font-size: 11.22px" id="cb3clearmobile">
                                                <input type="checkbox"   id="cb3mobile" required><label for="cb3mobile">
                                                    <span class="font-weight-bold" id="serviceModalOnclickMobile" data-toggle="modal" data-target="#serviceAgreementMobile">Hizmet Sözleşmesini</span> Onaylıyorum</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 11.22px">
                                                <input type="checkbox"  id="cb2mobile" required>
                                                <label for="cb2mobile">
                                                    İletişim bilgilerime e-ileti gönderilmesine izin veriyorum.</label>
                                            </p>
                                        </div>
                                        <div class="col-lg-12">
                                            <p class="remember-label" style="font-size: 10.70px" id="cb1clearmobile">
                                                <input type="checkbox"   id="cb1mobile" required>
                                                <label for="cb1mobile">
                                                    Verilerimin <span class="font-weight-bold" id="serviceModalOnclick1mobile" data-toggle="modal" data-target="#serviceAgreement1Mobile">Açık Rıza Metninde</span> belirtilen şekilde işlenmesine onay veriyorum..</label>
                                            </p>
                                        </div>
                                    </div>

                                    <button type="submit" class="d-none d-lg-block" style="color: white" id="onClickRegister">Kayıt Ol</button>
                                    <button type="submit" class="d-lg-none" style="color: white" id="onClickRegistermobile">Kayıt Ol</button>
                                </form>
                                <div class="extra-login">
                                    <span>Ya da</span>
                                    <div class="login-social">
                                        <a class="tw-login" href="{{route('socialite.redirect','google')}}" title=""><i
                                                class="fa fa-google"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div><!-- SIGNUP POPUP -->
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script src="{{asset('assets/js/isotop.js')}}" type="text/javascript"></script>
    <script src="{{asset('assets/js/jquery.scrollbar.min.js')}}" type="text/javascript"></script>
    <script>
        $(document).on('ready', function () {
            document.getElementById("jobSeeker").click();
        })
        $('#confirmation').on('click',function (){
            $('#close').click()
            $('#cb3clear').empty();
            $('#cb3clear').append('<input type="checkbox"   id="cb3" checked required><label for="cb3"><span class="font-weight-bold" id="serviceModalOnclick" data-toggle="modal" data-target="#serviceAgreement">Hizmet Sözleşmesini</span> Onaylıyorum</label>')
        });

        $('#confirmationmobile').on('click',function (){
            $('#closemobile').click()
            $('#cb3clearmobile').empty();
            $('#cb3clearmobile').append('<input type="checkbox"   id="cb3mobile" checked required><label for="cb3mobile"><span class="font-weight-bold" id="serviceModalOnclickMobile" data-toggle="modal" data-target="#serviceAgreementMobile">Hizmet Sözleşmesini</span> Onaylıyorum</label>')
        });
        $('#confirmation1').on('click',function (){
            $('#close1').click()
            $('#cb1clear').empty();
            $('#cb1clear').append('<input type="checkbox"   id="cb1" checked required><label for="cb1">Verilerimin <span class="font-weight-bold" id="serviceModalOnclick1" data-toggle="modal" data-target="#serviceAgreement1">Açık Rıza Metninde</span> belirtilen şekilde işlenmesine onay veriyorum..</label>')
        });
        $('#confirmation1mobile').on('click',function (){
            $('#close1mobile').click()
            $('#cb1clearmobile').empty();
            $('#cb1clearmobile').append('<input type="checkbox"   id="cb1mobile" checked required><label for="cb1mobile">Verilerimin <span class="font-weight-bold" id="serviceModalOnclick1mobile" data-toggle="modal" data-target="#serviceAgreement1Mobile">Açık Rıza Metninde</span> belirtilen şekilde işlenmesine onay veriyorum..</label>')
        });
        $('#cb3').on('click',function (){
            if (!$(this).is(':checked')) {
                $(this).attr('checked', true);
            }
            else{
                $('#serviceModalOnclick').click()
                $(this).attr('checked', false);
            }
        });

        $('#cb3mobile').on('click',function (){
            if (!$(this).is(':checked')) {
                $(this).attr('checked', true);
            }
            else{
                $('#serviceModalOnclickMobile').click()
                $(this).attr('checked', false);
            }
        });
        $('#cb1').on('click',function (){
            if (!$(this).is(':checked')) {
                $(this).attr('checked', true);
            }
            else{
                $('#serviceModalOnclick1').click()
                $(this).attr('checked', false);
            }
        });
        $('#cb1mobile').on('click', function () {
            if (!$(this).is(':checked')) {
                $(this).attr('checked', true);
            } else {
                $('#serviceModalOnclick1mobile').click()
                $(this).attr('checked', false);
            }
        });
        $('#onClickRegister').on('click', function () {
            $('#cb3mobile').attr('required', false);
            $('#cb2mobile').attr('required', false);
            $('#cb1mobile').attr('required', false);

            if (!$('#cb3').is(':checked')) {
                $('#messageDanger').empty()
                $('#messageDanger').append('<div class="alert alert-danger" role="alert">Lütfen Hizmet Sözleşmesini Onaylayın</div>')
            } else {
                $('#messageDanger').empty()
            }
            if (!$('#cb1').is(':checked')) {
                $('#messageDanger1').empty()
                $('#messageDanger1').append('<div class="alert alert-danger" role="alert">Lütfen Açık Rıza Metini Onaylayın</div>')
            } else {
                $('#messageDanger1').empty()
            }
            if (!$('#cb2').is(':checked')) {
                $('#messageDanger2').empty()
                $('#messageDanger2').append('<div class="alert alert-danger" role="alert">Lütfen iletişim bilgilerine e-ileti ile gönderilmesine izin verin</div>')
            } else {
                $('#messageDanger2').empty()
            }
        })
        $('#onClickRegistermobile').on('click', function () {
            $('#cb3').attr('required', false);
            $('#cb2').attr('required', false);
            $('#cb1').attr('required', false);
            if (!$('#cb3mobile').is(':checked')) {
                $('#messageDanger').empty()
                $('#messageDanger').append('<div class="alert alert-danger" role="alert">Lütfen Hizmet Sözleşmesini Onaylayın</div>')
            } else {
                $('#messageDanger').empty()
            }
            if (!$('#cb1mobile').is(':checked')) {
                $('#messageDanger1').empty()
                $('#messageDanger1').append('<div class="alert alert-danger" role="alert">Lütfen Açık Rıza Metini Onaylayın</div>')
            } else {
                $('#messageDanger1').empty()
            }
            if (!$('#cb2mobile').is(':checked')) {
                $('#messageDanger2').empty()
                $('#messageDanger2').append('<div class="alert alert-danger" role="alert">Lütfen iletişim bilgilerine e-ileti ile gönderilmesine izin verin</div>')
            } else {
                $('#messageDanger2').empty()
            }
        })
    </script>
@endpush
