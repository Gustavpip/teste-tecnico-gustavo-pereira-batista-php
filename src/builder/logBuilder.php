<?php

class LogBuilder {
    private $log;

    public function __construct() {
        $this->log = [];
    }

    public function setUrlChamada(string $url): self {
        $this->log['url_chamada'] = $url;
        return $this;
    }

    public function setCodigoStatus(int $codigoStatus): self {
        $this->log['codigo_status'] = $codigoStatus;
        return $this;
    }

    public function setResponseBody(string $corpoResposta): self {
        $this->log['corpo_resposta'] = $corpoResposta;
        return $this;
    }

    public function setRequestMethod(string $metodoRequisicao): self {
        $this->log['metodo_requisicao'] = $metodoRequisicao;
        return $this;
    }

    public function setClientIp(string $ipCliente): self {
        $this->log['ip_cliente'] = $ipCliente;
        return $this;
    }

    public function setUserAgent(string $usuarioAgente): self {
        $this->log['usuario_agente'] = $usuarioAgente;
        return $this;
    }

    public function setResponseTime(int $tempoResposta): self {
        $this->log['tempo_resposta'] = $tempoResposta;
        return $this;
    }

    public function setHeaders(string $cabecalhos): self {
        $this->log['cabecalhos'] = $cabecalhos;
        return $this;
    }

    public function setErroMessage(string $mensagemErro): self {
        $this->log['mensagem_erro'] = $mensagemErro;
        return $this;
    }

    public function build(): array {
        return $this->log;
    }
}
