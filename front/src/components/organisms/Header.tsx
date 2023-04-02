import { Flex, Box, Spacer } from '@chakra-ui/react';
import { Button } from '../atoms/Button';

export const Header = () => {
  return (
    <Box px={4} bgColor="#AF011C">
      <Flex h={{ sm: '40px', md: '60px' }} align="center" justifyContent="space-between">
        <Spacer />
        <Button
          size="md"
          textColor="white"
          mr="2"
          variant="ghost"
          _hover={{ opacity: '0.6' }}
          href="/login"
        >
          ログイン
        </Button>
        <Button
          size="md"
          textColor="white"
          mr="2"
          variant="outline"
          _hover={{ bgColor: 'white', color: '#AF011C' }}
          href="/register"
        >
          新規登録
        </Button>
      </Flex>
    </Box>
  );
};
