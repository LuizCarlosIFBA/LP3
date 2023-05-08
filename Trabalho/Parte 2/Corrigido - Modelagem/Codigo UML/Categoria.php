<?php



class Categoria {
    private string $name;
    private string $descricao;

    
    public function __construct(string $name, string $descricao) {
        $this->name = $name;
        $this->descricao = $descricao;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescricao(): string {
        return $this->descricao;
    }

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescricao(string $descricao): void {
        $this->descricao = $descricao;
    }

    
}
