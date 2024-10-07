<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Privacy extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('privacy_policies')->insert([
            'title' => 'Gizlilik Politikası',
            'slug' => 'gizlilik-politikasi',
            'description' => "<h3>GİZLİLİK S&Ouml;ZLEŞMESİ</h3>\n<p><strong>1. Taraflar</strong></p>\n<p>Bu Gizlilik S&ouml;zleşmesi (\"S&ouml;zleşme\"), BytenBlade (\"Şirket\") ile [M&uuml;şteri Adı] (\"M&uuml;şteri\") arasında, 30.09.2024 tarihinde, aşağıdaki şartlar dahilinde imzalanmıştır.</p>\n<p><strong>2. S&ouml;zleşmenin Amacı</strong></p>\n<p>Bu S&ouml;zleşme, Şirket ile M&uuml;şteri arasında, M&uuml;şteri'nin Şirket'e sağlayacağı veya Şirket'in M&uuml;şteri'den elde edeceği t&uuml;m gizli bilgilerin korunması ve gizliliğinin sağlanmasına ilişkin şartları belirlemek amacıyla hazırlanmıştır.</p>\n<p><strong>3. Gizli Bilgi Tanımı</strong></p>\n<p>Gizli bilgi, Şirket'in ve M&uuml;şteri'nin işleyişine ilişkin her t&uuml;rl&uuml; ticari, mali, teknik, stratejik veya &ouml;zel bilgiyi i&ccedil;erir. Bu bilgiler aşağıdakileri i&ccedil;erebilir, ancak bunlarla sınırlı değildir:</p>\n<ul>\n<li>Ticari sırlar</li>\n<li>İş planları</li>\n<li>Fikri m&uuml;lkiyet bilgileri</li>\n<li>M&uuml;şteri listeleri</li>\n<li>Teknik bilgiler, yazılımlar, sistemler</li>\n</ul>\n<p>Gizli bilgi, yazılı, s&ouml;zl&uuml;, elektronik veya başka bir şekilde elde edilmiş olabilir.</p>\n<p><strong>4. Tarafların Y&uuml;k&uuml;ml&uuml;l&uuml;kleri</strong></p>\n<p>Taraflar, gizli bilgileri sadece S&ouml;zleşme kapsamında belirtilen ama&ccedil;lar i&ccedil;in kullanmayı taahh&uuml;t eder. Gizli bilgilerin &uuml;&ccedil;&uuml;nc&uuml; şahıslara ifşa edilmemesi esastır. Taraflar, aşağıdaki y&uuml;k&uuml;ml&uuml;l&uuml;klere uymayı kabul eder:</p>\n<ul>\n<li>Gizli bilgileri, yalnızca bu bilgilerin korunmasından sorumlu personel ile paylaşmak</li>\n<li>Gizli bilgilerin korunması i&ccedil;in gerekli g&uuml;venlik tedbirlerini almak</li>\n<li>Bilgilerin izinsiz ifşa edilmesini &ouml;nlemek i&ccedil;in dikkatli davranmak</li>\n</ul>\n<p><strong>5. Gizli Bilgilerin İstisnaları</strong></p>\n<p>Aşağıdaki durumlar gizli bilgi kapsamı dışında sayılacaktır:</p>\n<ul>\n<li>Tarafların elinde bulunan bilgiler, bu S&ouml;zleşme imzalanmadan &ouml;nce zaten aleniyse</li>\n<li>Kamuya a&ccedil;ık kaynaklardan elde edilmişse</li>\n<li>Tarafların izniyle ifşa edilmişse</li>\n<li>Mahkeme kararı veya yasal bir zorunluluk nedeniyle ifşa edilmesi gerekiyorsa</li>\n</ul>\n<p><strong>6. Gizli Bilgilerin S&uuml;resi</strong></p>\n<p>Bu S&ouml;zleşme, tarafların gizli bilgiyi elde ettiği tarihten itibaren ge&ccedil;erli olacak ve gizli bilginin ifşa edilmemesi y&uuml;k&uuml;ml&uuml;l&uuml;ğ&uuml; S&ouml;zleşmenin sona ermesinden sonra da [X] yıl boyunca devam edecektir.</p>\n<p><strong>7. S&ouml;zleşmenin Sona Ermesi</strong></p>\n<p>Taraflardan herhangi biri, [X] g&uuml;n &ouml;nceden yazılı olarak bildirimde bulunarak bu S&ouml;zleşmeyi feshedebilir. Ancak fesih, daha &ouml;nce alınan gizli bilgilerin gizliliğine ilişkin y&uuml;k&uuml;ml&uuml;l&uuml;kleri ortadan kaldırmaz.</p>\n<p><strong>8. Uyuşmazlıkların &Ccedil;&ouml;z&uuml;m&uuml;</strong></p>\n<p>Bu S&ouml;zleşme'den doğacak her t&uuml;rl&uuml; uyuşmazlık, [Yetkili Mahkeme ve İcra Daireleri] tarafından &ccedil;&ouml;z&uuml;lecektir.</p>\n<p><strong>9. Diğer H&uuml;k&uuml;mler</strong></p>\n<p>Bu S&ouml;zleşme, tarafların yazılı mutabakatı olmaksızın değiştirilemez. S&ouml;zleşmenin herhangi bir h&uuml;km&uuml; ge&ccedil;ersiz hale gelirse, diğer h&uuml;k&uuml;mler ge&ccedil;erliliğini koruyacaktır.</p>\n<p><strong>10. Tarafların İmzaları</strong></p>\n<p>Taraflar, bu S&ouml;zleşmeyi imzalayarak yukarıdaki şartları kabul ettiklerini beyan ederler.</p>\n<p><strong>BytenBlade</strong>&nbsp;İmza: __________________<br />Tarih: __________________</p>\n<p><strong>[M&uuml;şteri Adı]</strong> İmza: __________________<br />Tarih: __________________</p>",
        ]);
    }
}
