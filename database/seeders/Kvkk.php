<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Kvkk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        DB::table('kvkks')->insert([
            'title' => 'KVKK AYDINLATMA METNİ',
            'slug' => 'kvkk-aydinlatma-metni',
            'description' => '<h3>KİŞİSEL VERİLERİN KORUNMASI VE İŞLENMESİ POLİTİKASI</h3>\n<p><strong>1. Genel Bilgilendirme</strong></p>\n<p>Bu Kişisel Verilerin Korunması ve İşlenmesi Politikası (&ldquo;Politika&rdquo;), 6698 sayılı Kişisel Verilerin Korunması Kanunu (&ldquo;KVKK&rdquo;) uyarınca, [Şirket Adı] tarafından kişisel verilerin işlenmesine, korunmasına ve saklanmasına ilişkin s&uuml;re&ccedil;leri a&ccedil;ıklamak amacıyla hazırlanmıştır. Şirketimiz, kişisel verilerinizi işleme faaliyetlerini, kanuna uygun bir şekilde, d&uuml;r&uuml;stl&uuml;k ve şeffaflık ilkeleri doğrultusunda ger&ccedil;ekleştirmektedir.</p>\n<p><strong>2. Kişisel Verilerin Toplanması ve İşlenmesi</strong></p>\n<p>Kişisel verileriniz, şirketimiz tarafından farklı kanallar aracılığıyla, yazılı, s&ouml;zl&uuml; veya elektronik yollarla toplanabilir. Toplanan kişisel veriler, KVKK kapsamında belirtilen hukuki sebepler doğrultusunda işlenir. Kişisel verileriniz şu ama&ccedil;larla işlenebilir:</p>\n<ul>\n<li>Hizmetlerin sunulabilmesi</li>\n<li>İletişim faaliyetlerinin y&uuml;r&uuml;t&uuml;lmesi</li>\n<li>Hukuki y&uuml;k&uuml;ml&uuml;l&uuml;klerin yerine getirilmesi</li>\n<li>M&uuml;şteri ilişkilerinin y&ouml;netilmesi</li>\n<li>İdari ve mali işlemlerin y&uuml;r&uuml;t&uuml;lmesi</li>\n</ul>\n<p><strong>3. Kişisel Verilerin Saklanması ve G&uuml;venliği</strong></p>\n<p>Kişisel verileriniz, işlenme ama&ccedil;larının gerektirdiği s&uuml;re boyunca saklanır. Bu s&uuml;re sonunda kişisel veriler, kanuna uygun y&ouml;ntemlerle imha edilir. Şirketimiz, kişisel verilerin gizliliğini ve g&uuml;venliğini sağlamak i&ccedil;in gerekli teknik ve idari tedbirleri alır.</p>\n<p><strong>4. Kişisel Verilerin &Uuml;&ccedil;&uuml;nc&uuml; Kişilere Aktarılması</strong></p>\n<p>Kişisel verileriniz, KVKK&rsquo;nın 8. ve 9. maddelerine uygun olarak, hukuki y&uuml;k&uuml;ml&uuml;l&uuml;klerin yerine getirilmesi veya a&ccedil;ık rızanızın alınması suretiyle &uuml;&ccedil;&uuml;nc&uuml; kişilere aktarılabilir. Kişisel verileriniz aşağıdaki ama&ccedil;larla &uuml;&ccedil;&uuml;nc&uuml; taraflarla paylaşılabilir:</p>\n<ul>\n<li>Yasal zorunluluklar</li>\n<li>Yetkili kamu kurum ve kuruluşları ile yasal d&uuml;zenlemelere uygun paylaşım</li>\n<li>İş ortaklarıyla iş s&uuml;re&ccedil;lerinin y&uuml;r&uuml;t&uuml;lmesi</li>\n</ul>\n<p><strong>5. Kişisel Verilere İlişkin Haklarınız</strong></p>\n<p>KVKK&rsquo;nın 11. maddesi gereğince, kişisel verilerinizle ilgili olarak aşağıdaki haklara sahipsiniz:</p>\n<ul>\n<li>Kişisel verilerinizin işlenip işlenmediğini &ouml;ğrenme</li>\n<li>İşlenmişse buna ilişkin bilgi talep etme</li>\n<li>Kişisel verilerin amacına uygun kullanılıp kullanılmadığını &ouml;ğrenme</li>\n<li>Yanlış veya eksik işlenen verilerin d&uuml;zeltilmesini talep etme</li>\n<li>Kişisel verilerin silinmesini veya yok edilmesini talep etme</li>\n<li>Kişisel verilerin yurt i&ccedil;inde veya yurt dışında &uuml;&ccedil;&uuml;nc&uuml; kişilere aktarılıp aktarılmadığını &ouml;ğrenme</li>\n</ul>\n<p>Taleplerinizi, [Şirket İletişim Bilgileri] aracılığıyla bize iletebilirsiniz. Başvurularınız, en kısa s&uuml;rede ve en ge&ccedil; 30 g&uuml;n i&ccedil;inde yanıtlanacaktır.</p>\n<p><strong>6. Politika G&uuml;ncellemeleri</strong></p>\n<p>Bu politika, gerektiğinde g&uuml;ncellenebilir ve değişiklikler web sitemizde duyurulur. Politika &uuml;zerindeki g&uuml;ncellemeler, yayınlandığı tarihte y&uuml;r&uuml;rl&uuml;ğe girer.</p>"',
        ]);


    }
}
