<?php

namespace Amit\Test\Setup;
use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface {

    /**
     * @var \Magento\Cms\Model\BlockFactory
     */
    protected $blockFactory;

    /**
     * @var \Magento\Cms\Model\BlockRepository
     */
    protected $blockRepository;

    /**
     * @param PageFactory $resultPageFactory
     * @param \Magento\Cms\Model\BlockFactory $blockFactory
     * @param \Magento\Cms\Model\BlockRepository $blockRepository
     */
    public function __construct(
        PageFactory $resultPageFactory,
        \Magento\Cms\Model\BlockFactory $blockFactory,
        \Magento\Cms\Model\BlockRepository $blockRepository
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->blockFactory = $blockFactory;
        $this->blockRepository = $blockRepository;
    }

    public function install( ModuleDataSetupInterface $setup, ModuleContextInterface $context ) {
        $data = [
            'title' => 'Test Block',
            'identifier' => 'test-block',
            'stores' => ['0'],
            'is_active' => 1,
            'content' => 'Testing'
        ];
        $newBlock = $this->blockFactory->create(['data' => $data]);
        $this->blockRepository->save($newBlock);
    }
}