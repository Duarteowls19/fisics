<?php

include('./essencials/protect.php');

if (!class_exists('Conexao')) {
    include('./essencials/connection.php');
}

try {
    $conexao = new Conexao();
    $stmt = $conexao->conn->prepare("SELECT * FROM comments ");
    $stmt->execute();

    // Obtendo os resultados
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    exit("Erro na conexão: " . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    
<body>
<section>

    <div class="title_">
        <h2>Biografia</h2>
        <div class="line_"></div>
    </div>
    <div class="img_">
        <img src="./images/other/th (7).jpg" alt="">
    </div>
    <div class="p_">
        <p>
        Alessandro Volta (1745-1827) foi um instrutor físico italiano e pioneiro no campo da eletricidade. Ele é mais conhecido por inventar a primeira bateria química, conhecida como a "pilha voltaica", que foi um marco importante no desenvolvimento da tecnologia elétrica.

Nascido em 18 de fevereiro de 1745, em Como, na Itália, Volta era filho de uma família da nobreza. Ele recebeu uma educação jesuíta de alta qualidade, demonstrando um talento excepcional para a matemática e física desde a tenra idade. Em 1774, foi nomeado professor de física experimental na Universidade de Pavia, cargo que ocupou por quase 40 anos.

Volta desenvolvido grande parte de sua vida ao estudo da eletricidade. Ele realizou uma série de experimentos com geradores eletrostáticos e acumuladores de carga. Seus estudos o levaram a descobrir que a eletricidade poderia ser produzida através de reações químicas. Em 1800, ele obteve a primeira pilha voltaica, também conhecida como pilha galvânica, que consistia em uma pilha de discos alternados de zinco e cobre, separados por discos de tecido embebidos em uma solução salina. Essa invenção foi um marco significativo na história da eletricidade, pois foi a primeira fonte contínua de eletricidade produzida através de reações químicas.

A descoberta da pilha voltaica revolucionou o campo da eletricidade e abriu caminho para o desenvolvimento de tecnologias elétricas. A unidade de medida da diferença de potencial elétrico, o volt, foi nomeada em sua homenagem, em reconhecimento a suas contribuições para o campo.

Além de seu trabalho em eletricidade, Volta também fez importantes contribuições em outros campos científicos. Ele estudou a composição do metano, desenvolveu o eletroscópio de folhas de ouro e realizou pesquisas sobre a descomposição de compostos químicos por meio de eletricidade.

Alessandro Volta foi um cientista homenageado e reconhecido por seus colegas. Ele recebeu várias honras ao longo de sua vida, incluindo o título de nobreza do Império Austríaco e a Ordem da Coroa de Ferro da Itália. Ele faleceu em 5 de março de 1827, em Como, deixando um legado duradouro no campo da eletricidade e da física. Sua contribuição revolucionária para a compreensão e aplicação da eletricidade ainda é valorizada até os dias de hoje.
        </p>
        <a href="https://youtu.be/RHHui58_YnA">
            link
        </a>
    </div>
    <div class="title_">
        <h2>invenções</h2>
        <div class="line_"></div>
    </div>
    <div class="img_">
        <img src="./images/other/th (8).jpg" alt="">
    </div>
    <div class="p_">
        <p>
        Aqui estão alguns eventos importantes na vida de Alessandro Volta:

18 de fevereiro de 1745: Alessandro Volta nasce em Como, na Itália.
1774: Volta é nomeado professor de física experimental na Universidade de Pavia.
1775: Volta inventa o eletrômetro condensador, um dispositivo para medir a diferença de potencial elétrico.
1791: Volta a desenvolver o eletroscópio de folhas de ouro, um instrumento usado para detectar e medir cargas elétricas.
1800: Volta inventa a pilha voltaica, também conhecida como pilha galvânica, a primeira bateria química capaz de produzir eletricidade de forma contínua.
1801: Volta recebe
        </p>
    </div>
    <div class="title_">
        <h2>Pesquisas</h2>
        <div class="line_"></div>
    </div>
    <div class="img_">
        <img src="./images/other/eletroquimica-capa.jpg" alt="">
    </div>
    <div class="p_">
        <p>
        As principais pesquisas de Alessandro Volta que ainda têm ouvido os dias de hoje incluem: até

Pilha Voltaica: A invenção da pilha voltaica por Volta em 1800 foi um marco importante no campo da eletricidade. A pilha voltaica foi a primeira fonte contínua de eletricidade produzida por meio de reações químicas. Essa descoberta estabeleceu as bases para o desenvolvimento das baterias modernas e foi fundamental para a compreensão e aplicação da eletricidade.

Eletricidade: As pesquisas de Volta sobre eletricidade, incluindo o estudo dos geradores eletrostáticos, acumuladores de carga e descoberta da eletricidade gerada por reações químicas, foram fundamentais para o avanço do conhecimento nesse campo. Suas contribuições sentaram como bases para a compreensão dos princípios da eletricidade e do desenvolvimento de tecnologias elétricas.

Eletroquímica: Uma pesquisa de Volta na área da eletroquímica, que envolve o estudo das reações químicas que ocorrem na presença de uma corrente elétrica, foi pioneira e continua sendo relevante atualmente. seus estudos
        </p>
    </div>
    <div class="p_">
        <p class="credit">
        е елементарен примерен текст, използван в печатарската и типографската индустрия.
        </p>

    </div>
</section>

<section>
    <div class="comments_">
        <div class="comments_line">
            <img src="./images/other/Design sem nome (3).png" alt="">
            <h2>comments</h2>
            <div class="comentar"><a href="<?php echo htmlspecialchars('/fisics/comments'); ?>">comentar</a></div>
        </div>

            <?php if (empty($result)) { ?>

            <div class="content_">
            <p>404.</p>
            </p>
       
     <?php } else {
        foreach ($result as $row) {
     ?>
     <div class="comments_forreal">
        
            <div class="info_r">
                <img src="./images/other/Design sem nome (4).png" alt="">
                <p><?php echo $row['nome'];  ?></p>
                <p><?php echo substr($row['data_cad'], 0, 10);  ?></p>
            </div>
            
            <div class="content_">
            <p><?php echo $row['conteudo'];  ?></p>
            </div>

     </div>

     <?php
        }
     }
     ?>

        </div>
</section>

</body>
</html>